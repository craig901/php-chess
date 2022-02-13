<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class King extends Piece
{
    /**
     * King constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::KING;
        $this->whiteSymbol = PieceSymbols::WHITE_KING;
        $this->blackSymbol = PieceSymbols::BLACK_KING;
    }
}
