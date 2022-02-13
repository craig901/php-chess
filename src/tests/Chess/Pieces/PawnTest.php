<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class PawnTest extends ChessTestCase
{
    /**
     * @var Pawn
     */
    private Pawn $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Pawn(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is pawn method
     */
    public function test_isPawn(): void
    {
        $this->assertTrue( $this->model->isPawn() );
    }
}
