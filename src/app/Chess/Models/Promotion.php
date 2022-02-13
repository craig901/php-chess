<?php namespace App\Chess\Models;

use App\Chess\Pieces\Piece;

class Promotion
{
    /**
     * @var Coordinate
     */
    protected Coordinate $coordinate;

    /**
     * @var Piece
     */
    protected Piece $piece;

    /**
     * Promotion constructor.
     * @param Coordinate $coordinate
     * @param Piece $piece
     */
    public function __construct( Coordinate  $coordinate, Piece $piece )
    {
        $this->coordinate = $coordinate;
        $this->piece = $piece;
    }

    /**
     * @return Coordinate
     */
    public function getCoordinate(): Coordinate
    {
        return $this->coordinate;
    }

    /**
     * @return Piece
     */
    public function getPiece(): Piece
    {
        return $this->piece;
    }
}
