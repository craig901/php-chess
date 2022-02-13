<?php namespace App\Chess\Handlers;

use App\Chess\Config\GameConfig;
use App\Chess\Config\SetPieces;
use App\Chess\Models\Coordinate;
use App\Chess\Models\File;
use App\Chess\Models\Game;
use App\Chess\Models\Move;
use \App\Chess\Models\Log;
use App\Chess\Models\Player;
use App\Chess\Models\Promotion;
use App\Chess\Storage\Coordinates;

class GameHandler
{
    /**
     * @var GameConfig
     */
    protected GameConfig $config;

    /**
     * @var Game
     */
    protected Game $game;

    /**
     * @var MoveHandler
     */
    protected MoveHandler $moveHandler;

    /**
     * @var LogHandler
     */
    protected LogHandler $logHandler;

    /**
     * @var Player|null
     */
    protected ?Player $winner = null;

    /**
     * GameHandler constructor.
     * @param GameConfig $config
     */
    public function __construct( GameConfig $config )
    {
        $this->config = $config;
        $this->game = new Game( $config );
        $setPieces = new SetPieces();
        $setPieces->setPieces( $this->game );
        $this->moveHandler = new MoveHandler();
        $this->logHandler = new LogHandler( $config );
    }

    /**
     * @param Coordinate $from
     * @param Coordinate $to
     */
    public function move( Coordinate $from, Coordinate $to ): void
    {
        if( $this->canMove( $from, $to ) )
        {
            $move = $this->getMove( $from, $to );
            $this->moveHandler->handleSpecialMoves( $move );
            $this->setupTakePiece( $move );
            $move->getPiece()->addMove( $move );
            $this->logHandler->addMove( $move );
            if( $move->getPieceToTake() )
            {
                $this->game->takePiece( $move );
            }
            $this->game->move( $move );
        }
    }

    /**
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->game->getFiles();
    }

    /**
     * @return Log[]
     */
    public function getLogs(): array
    {
       return $this->logHandler->getLogs();
    }

    /**
     * @return Player|null
     */
    public function getWinner(): ?Player
    {
        return $this->winner;
    }

    /**
     * @param Coordinate $from
     * @param Coordinate $to
     * @return bool
     */
    private function canMove( Coordinate $from, Coordinate $to ): bool
    {
        try {

            if( !is_null( $this->winner ) )
            {
                throw new \Exception( 'Game has been won!' );
            }

            // Get the piece that is going to be moved
            $piece = $this->game->getPieceByCoordinate( $from );

            // Check if the piece exists
            if( !$piece )
            {
                throw new \Exception( 'No piece available to move' );
            }

            // Is the correct colour moving
            if( !$this->game->correctColourToGo( $piece ) )
            {
                throw new \Exception( 'Incorrect player attempted to move!' );
            }

            // Instantiate the move object
            $move = $this->getMove( $from, $to );
            $this->setupTakePiece( $move );

            // Legal move
            if( !$this->moveHandler->legalMove( $move ) )
            {
                throw new \Exception( 'Illegal move' );
            }

            // Check if the route free
            if( !$this->moveHandler->routeFree( $move ) )
            {
                throw new \Exception( 'Illegal move a piece is in your way' );
            }

            // Is the 'to' coordinate occupied by the same colour
            if( $this->game->moveOccupiedByTheSameColour( $piece, $to ) )
            {
                throw new \Exception( 'Can not move a piece to a spot which occupies another piece with the same colour!' );
            }

            return true;
        }
        catch ( \Exception $e )
        {
            $piece = isset( $piece ) ? $piece : null;
            $this->logHandler->addMoveError( $from, $to, $e->getMessage(), $piece );
            return false;
        }
    }

    public function promote( Coordinate $coordinate, string $pieceType ): bool
    {
        try{

            $pawn = $this->game->getPieceByCoordinate( $coordinate );

            if( !$pawn || !$pawn->isPawn() )
            {
                throw new \Exception( 'No piece available to promote' );
            }

            if( $pawn->isWhite() && $coordinate->getRank() !== Coordinates::EIGHT )
            {
                throw new \Exception( 'No piece available to promote' );
            }

            if( $pawn->isBlack() && $coordinate->getRank() !== Coordinates::ONE )
            {
                throw new \Exception( 'No piece available to promote' );
            }

            $promoteToo = $this->game->getPieceTaken( $pawn->getColour(), $pieceType );
            if( !$promoteToo )
            {
                throw new \Exception( 'Piece not available' );
            }

            $promotion = new Promotion( $coordinate, $promoteToo );
            $this->game->promotePawn( $promotion );
            $this->logHandler->addPromotion( $promotion );

            return true;

        } catch ( \Exception $e )
        {
            $this->logHandler->addPromotionError( $coordinate, $e->getMessage() );
            return false;
        }
    }

    /**
     * @param Coordinate $from
     * @param Coordinate $to
     * @return Move
     */
    private function getMove( Coordinate $from, Coordinate $to ): Move
    {
        $piece = $this->game->getPieceByCoordinate( $from );
        return new Move( $this->game, $piece, $from, $to );
    }

    /**
     * @param Move $move
     */
    private function setupTakePiece( Move $move )
    {
        $pieceToTake = $this->game->getPieceByCoordinate( $move->getTo() );
        if( $pieceToTake && $pieceToTake->getColour() !== $move->getPiece()->getColour() )
        {
            if( $pieceToTake->isKing() )
            {
                $player = $this->config->getPlayerByColour( $move->getPiece()->getColour() );
                $this->setWinner( $player );
            }
            $move->setPieceToTake( $pieceToTake );
        }
    }

    /**
     * @param Player $player
     */
    private function setWinner( Player $player ): void
    {
        $this->winner = $player;
    }
}
