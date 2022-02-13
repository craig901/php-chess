<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class Pawn extends Piece
{
    /**
     * Pawn constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::PAWN;
        $this->whiteSymbol = PieceSymbols::WHITE_PAWN;
        $this->blackSymbol = PieceSymbols::BLACK_PAWN;
    }
}
