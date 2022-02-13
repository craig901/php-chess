<?php namespace App\Chess\Models;

use App\Chess\Logic\Moves\Special\Castling;
use App\Chess\Pieces\Piece;

class Move
{
    /**
     * @var Game
     */
    protected Game $game;

    /**
     * @var Piece
     */
    protected Piece $piece;

    /**
     * @var Coordinate
     */
    protected Coordinate $from;

    /**
     * @var Coordinate
     */
    protected Coordinate $to;

    /**
     * @var ?Piece
     */
    protected ?Piece $pieceToTake;

    /**
     * @var ?Castling
     */
    protected ?Castling $castling;

    /**
     * @var bool
     */
    protected bool $promotionAvailable;

    /**
     * Move constructor.
     *
     * @param Game $game
     * @param Piece $piece
     * @param Coordinate $from
     * @param Coordinate $to
     */
    public function __construct( Game $game, Piece $piece, Coordinate $from, Coordinate $to )
    {
        $this->game = clone $game;
        $this->piece = clone $piece;
        $this->from = $from;
        $this->to = $to;
        $this->pieceToTake = null;
        $this->castling = null;
        $this->promotionAvailable = false;
    }

    /**
     * @return Game
     */
    public function getGame(): Game
    {
        return $this->game;
    }

    /**
     * @return Piece
     */
    public function getPiece(): Piece
    {
        return $this->piece;
    }

    /**
     * @return Coordinate
     */
    public function getFrom(): Coordinate
    {
        return $this->from;
    }

    /**
     * @return Coordinate
     */
    public function getTo(): Coordinate
    {
        return $this->to;
    }

    /**
     * @param Piece $piece
     */
    public function setPieceToTake( Piece $piece )
    {
        $this->pieceToTake = $piece;
    }

    /**
     * @return mixed
     */
    public function getPieceToTake(): ?Piece
    {
        return $this->pieceToTake;
    }

    /**
     * @param Castling $castling
     */
    public function setCastling( Castling $castling )
    {
        $this->castling = $castling;
    }

    /**
     * @return Castling|null
     */
    public function getCastling(): ?Castling
    {
        return $this->castling;
    }

    /**
     * @param $val
     */
    public function setPromotionAvailable( $val ): void
    {
        $this->promotionAvailable = $val;
    }

    /**
     * @return bool
     */
    public function getPromotionAvailable(): bool
    {
        return $this->promotionAvailable;
    }
}
