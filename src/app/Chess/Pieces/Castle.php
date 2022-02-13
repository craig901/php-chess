<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class Castle extends Piece
{
    /**
     * Castle constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::CASTLE;
        $this->whiteSymbol = PieceSymbols::WHITE_CASTLE;
        $this->blackSymbol = PieceSymbols::BLACK_CASTLE;
    }
}
