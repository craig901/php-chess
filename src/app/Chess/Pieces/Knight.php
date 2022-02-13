<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class Knight extends Piece
{
    /**
     * Knight constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::KNIGHT;
        $this->whiteSymbol = PieceSymbols::WHITE_KNIGHT;
        $this->blackSymbol = PieceSymbols::BLACK_KNIGHT;
    }
}
