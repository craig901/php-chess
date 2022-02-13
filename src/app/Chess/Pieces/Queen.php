<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;

class Queen extends Piece
{
    /**
     * Queen constructor.
     *
     * @param $color
     * @param Coordinate $coordinate
     */
    public function __construct( $color, Coordinate $coordinate )
    {
        parent::__construct( $color, $coordinate );
        $this->key = Pieces::QUEEN;
        $this->whiteSymbol = PieceSymbols::WHITE_QUEEN;
        $this->blackSymbol = PieceSymbols::BLACK_QUEEN;
    }
}
