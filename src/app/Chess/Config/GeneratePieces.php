<?php namespace App\Chess\Config;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Bishop;
use App\Chess\Pieces\Castle;
use App\Chess\Pieces\King;
use App\Chess\Pieces\Knight;
use App\Chess\Pieces\Pawn;
use App\Chess\Pieces\Piece;
use App\Chess\Pieces\Queen;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;

class GeneratePieces
{
    /**
     * @var Piece[]
     */
    protected $pieces = [];

    public function __construct()
    {
        // White

        $start = new Coordinate( Coordinates::A, Coordinates::EIGHT );
        $castle = new Castle( Colours::BLACK, $start );
        array_push($this->pieces, $castle );

        $start = new Coordinate( Coordinates::B, Coordinates::EIGHT );
        $knight = new Knight( Colours::BLACK, $start );
        array_push($this->pieces, $knight );

        $start = new Coordinate( Coordinates::C, Coordinates::EIGHT );
        $bishop = new Bishop( Colours::BLACK, $start );
        array_push($this->pieces, $bishop );

        $start = new Coordinate( Coordinates::D, Coordinates::EIGHT );
        $queen = new Queen( Colours::BLACK, $start );
        array_push($this->pieces, $queen );

        $start = new Coordinate( Coordinates::E, Coordinates::EIGHT );
        $king = new King( Colours::BLACK, $start );
        array_push($this->pieces, $king );

        $start = new Coordinate( Coordinates::F, Coordinates::EIGHT );
        $bishop = new Bishop( Colours::BLACK, $start );
        array_push($this->pieces, $bishop );

        $start = new Coordinate( Coordinates::G, Coordinates::EIGHT );
        $knight = new Knight( Colours::BLACK, $start );
        array_push($this->pieces, $knight );

        $start = new Coordinate( Coordinates::H, Coordinates::EIGHT );
        $castle = new Castle( Colours::BLACK, $start );
        array_push($this->pieces, $castle );

        $start = new Coordinate( Coordinates::A, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::B, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::C, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::D, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::E, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::F, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::G, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::H, Coordinates::SEVEN );
        $pawn = new Pawn( Colours::BLACK, $start );
        array_push($this->pieces, $pawn );

        // Black

        $start = new Coordinate( Coordinates::A, Coordinates::ONE );
        $castle = new Castle( Colours::WHITE, $start );
        array_push($this->pieces, $castle );

        $start = new Coordinate( Coordinates::B, Coordinates::ONE );
        $knight = new Knight( Colours::WHITE, $start );
        array_push($this->pieces, $knight );

        $start = new Coordinate( Coordinates::C, Coordinates::ONE );
        $bishop = new Bishop( Colours::WHITE, $start );
        array_push($this->pieces, $bishop );

        $start = new Coordinate( Coordinates::D, Coordinates::ONE );
        $queen = new Queen( Colours::WHITE, $start );
        array_push($this->pieces, $queen );

        $start = new Coordinate( Coordinates::E, Coordinates::ONE );
        $king = new King( Colours::WHITE, $start );
        array_push($this->pieces, $king );

        $start = new Coordinate( Coordinates::F, Coordinates::ONE );
        $bishop = new Bishop( Colours::WHITE, $start );
        array_push($this->pieces, $bishop );

        $start = new Coordinate( Coordinates::G, Coordinates::ONE );
        $knight = new Knight( Colours::WHITE, $start );
        array_push($this->pieces, $knight );

        $start = new Coordinate( Coordinates::H, Coordinates::ONE );
        $castle = new Castle( Colours::WHITE, $start );
        array_push($this->pieces, $castle );

        $start = new Coordinate( Coordinates::A, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::B, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::C, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::D, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::E, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::F, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::G, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

        $start = new Coordinate( Coordinates::H, Coordinates::TWO );
        $pawn = new Pawn( Colours::WHITE, $start );
        array_push($this->pieces, $pawn );

    }

    /**
     * @return Piece[]
     */
    public function GetPieces(): array
    {
        return $this->pieces;
    }
}
