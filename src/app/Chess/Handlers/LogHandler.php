<?php namespace App\Chess\Handlers;

use App\Chess\Config\GameConfig;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Log;
use App\Chess\Models\Move;
use App\Chess\Models\Promotion;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\LogTypes;

class LogHandler
{
    /**
     * @var array
     */
    private array $logs = [];

    /**
     * @var GameConfig
     */
    private GameConfig $config;

    /**
     * LogHandler constructor.
     * @param GameConfig $config
     */
    public function __construct( GameConfig $config )
    {
        $this->config = $config;
    }

    /**
     * @param Move $move
     */
    public function addMove( Move $move ): void
    {
        $player = $this->config->getPlayerByColour( $move->getPiece()->getColour() );
        $log = new Log( LogTypes::MOVE );
        $log->setPlayer( $player );
        $log->setFrom( $move->getFrom() );
        $log->setTo( $move->getTo() );
        $log->setPiece( $move->getPiece() );
        if( $move->getPieceToTake() )
            $log->setPieceTaken( $move->getPieceToTake() );
        $this->addLog( $log );
        if( $move->getCastling() )
            $log->setCastling( true );
    }

    /**
     * @param Coordinate $from
     * @param Coordinate $to
     * @param $error
     * @param Piece|null $piece
     */
    public function addMoveError( Coordinate $from, Coordinate $to, $error, Piece $piece = null ): void
    {
        $log = new Log( LogTypes::MOVE_ERROR );
        $log->setError( $error );
        $log->setFrom( $from );
        $log->setTo( $to );
        if( $piece )
            $log->setPiece( $piece );
        $this->addLog( $log );
    }

    /**
     * @param Promotion $promotion
     */
    public function addPromotion( Promotion $promotion ): void
    {
        $log = new Log( LogTypes::PROMOTION );
        $log->setPromotion( $promotion );
        $this->addLog( $log );
    }

    public function addPromotionError( Coordinate $coordinate, $error ): void
    {
        $log = new Log( LogTypes::PROMOTION_ERROR );
        $log->setError( $error );
        $this->addLog( $log );
    }

    /**
     * @return Log[]
     */
    public function getLogs(): array
    {
        return array_reverse( $this->logs );
    }

    /**
     * @param Log $log
     */
    private function addLog( Log $log ): void
    {
        $this->logs[] = $log;
    }
}
