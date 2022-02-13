<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Queen;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class QueenTest extends ChessTestCase
{
    /**
     * @var Queen
     */
    private Queen $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Queen(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is queen method
     */
    public function test_isQueen(): void
    {
        $this->assertTrue( $this->model->isQueen() );
    }
}
