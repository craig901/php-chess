<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class Bishop extends Piece
{
    /**
     * Bishop constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::BISHOP;
        $this->whiteSymbol = PieceSymbols::WHITE_BISHOP;
        $this->blackSymbol = PieceSymbols::BLACK_BISHOP;
    }
}
