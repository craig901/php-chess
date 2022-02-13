<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\King;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class KingTest extends ChessTestCase
{
    /**
     * @var King
     */
    private King $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new King(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is king method
     */
    public function test_isKing(): void
    {
        $this->assertTrue( $this->model->isKing() );
    }
}
