<?php namespace App\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Handlers\ScoreHandler;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Pieces;

class Game
{
    /**
     * @var GameConfig
     */
    protected GameConfig $config;

    /**
     * @var Board
     */
    public Board $board;

    /**
     * @var ScoreHandler
     */
    protected ScoreHandler $scores;

    /**
     * @var string
     */
    protected string $currentColour;

    /**
     * @var Player|null
     */
    protected ?Player $winner;

    /**
     * Game constructor.
     * @param GameConfig $config
     */
    public function __construct( GameConfig $config )
    {
        $this->config = $config;
        $this->board = new Board( $config );
        // White always goes first
        // Please note the colour in the config powers which way the board is up
        $this->currentColour = Colours::WHITE;
        $this->scores = new ScoreHandler();
    }

    /**
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->board->getFiles();
    }

    /**
     * @param Coordinate $coordinate
     * @return Piece|null
     */
    public function getPieceByCoordinate( Coordinate $coordinate ): ?Piece
    {
        return $this->board->getPieceByCoordinate( $coordinate );
    }

    /**
     * @param Piece $piece
     * @return bool
     */
    public function correctColourToGo( Piece $piece ): bool
    {
        if( $this->currentColour === $piece->getColour() )
            return true;

        return false;
    }

    /**
     * @param Piece $piece
     * @param Coordinate $coordinate
     * @return bool
     */
    public function moveOccupiedByTheSameColour( Piece $piece, Coordinate $coordinate ): bool
    {
        $pieceToBeTaken = $this->board->getPieceByCoordinate( $coordinate );
        if( is_null( $pieceToBeTaken ) )
            return false;

        if( $pieceToBeTaken )
        {
            if( $pieceToBeTaken->getColour() === $piece->getColour() )
                return true;
        }

        return false;
    }

    /**
     * @param Move $move
     */
    public function takePiece( Move $move )
    {
        $this->board->takePiece( $move );
        $this->scores->takePiece( $move );
        if( $move->getPiece()->isKing() === Pieces::KING )
        {
            $winner = $this->config->getPlayerByColour( $move->getPiece()->getColour() );
            $this->setWinner( $winner );
        }
    }

    /**
     * @param Promotion $promotion
     */
    public function promotePawn( Promotion $promotion ): void
    {
        $this->board->promotePawn( $promotion );
    }

    /**
     * @param Move $move
     */
    public function move( Move $move )
    {
        $this->board->move( $move );
        $this->currentColour = ( $this->currentColour == Colours::WHITE ) ? Colours::BLACK : Colours::WHITE;
    }

    /**
     * @param $colour
     * @param $piece
     * @return Piece|null
     */
    public function getPieceTaken( $colour, $piece ):? Piece
    {
        return $this->scores->getPiece( $colour, $piece );
    }

    /**
     * @param Player $player
     */
    private function setWinner( Player $player ): void
    {
        $this->winner = $player;
    }
}
