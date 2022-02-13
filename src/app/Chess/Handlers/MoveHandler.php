<?php namespace App\Chess\Handlers;

use App\Chess\Logic\Moves;
use App\Chess\Logic\Route;
use App\Chess\Models\Move;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use App\Chess\Storage\Pieces;

class MoveHandler
{
    /**
     * @var Moves
     */
    private Moves $moves;

    /**
     * @var Route
     */
    private Route $route;

    /**
     * MoveHandler constructor.
     */
    public function __construct()
    {
        $this->moves = new Moves();
        $this->route = new Route();
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function legalMove( Move $move ): bool
    {
        switch( $move->getPiece()->getKey() )
        {
            case Pieces::PAWN:
                return $this->moves->getPawn()->canMove( $move );

            case Pieces::CASTLE:
                return $this->moves->getCastle()->canMove( $move );

            case Pieces::KNIGHT:
                return $this->moves->getKnight()->canMove( $move );

            case Pieces::BISHOP:
                return $this->moves->getBishop()->canMove( $move );

            case Pieces::QUEEN:
                return $this->moves->getQueen()->canMove( $move );

            case Pieces::KING:
                return $this->moves->getKing()->canMove( $move );
        }
        return true;
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function routeFree( Move $move ): bool
    {
        switch( $move->getPiece()->getKey() )
        {
            case Pieces::PAWN:
                return $this->route->getPawn()->canMove( $move );

            case Pieces::KNIGHT:
                return $this->route->getKnight()->canMove( $move );

            case Pieces::BISHOP:
                return $this->route->getBishop()->canMove( $move );

            case Pieces::CASTLE:
                return $this->route->getCastle()->canMove( $move );

            case Pieces::QUEEN:
                return $this->route->getQueen()->canMove( $move );

            case Pieces::KING:
                return $this->route->getKing()->canMove( $move );
        }
        return true;
    }

    /**
     * @param Move $move
     */
    public function handleSpecialMoves( Move $move ): void
    {
        switch( $move->getPiece()->getKey() )
        {
            case Pieces::PAWN:
                $this->handlePromotion( $move );
                break;

            case Pieces::KING:
                $this->handleCastling( $move );
                break;
        }
    }

    /**
     * @param Move $move
     */
    private function handlePromotion( Move $move ): void
    {
        switch( $move->getPiece()->getColour() )
        {
            case Colours::WHITE:
                if( $move->getTo()->getFile() === Coordinates::D )
                {
                    $move->setPromotionAvailable( true );
                }
                break;

            case Colours::BLACK:
                if( $move->getTo()->getFile() === Coordinates::A )
                {
                    $move->setPromotionAvailable( true );
                }
                break;
        }
    }

    /**
     * @param Move $move
     */
    private function handleCastling( Move $move ): void
    {
        switch( $move->getPiece()->getKey() )
        {
            case Pieces::KING:
                if( $this->moves->getKing()->isCastling( $move ) )
                {
                    $castling = new Moves\Special\Castling( $move );
                    $move->setCastling( $castling );
                }
                break;
        }
    }
}
