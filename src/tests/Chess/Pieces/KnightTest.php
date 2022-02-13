<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Knight;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class KnightTest extends ChessTestCase
{
    /**
     * @var Knight
     */
    private Knight $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Knight(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is knight method
     */
    public function test_isKnight(): void
    {
        $this->assertTrue( $this->model->isKnight() );
    }
}
