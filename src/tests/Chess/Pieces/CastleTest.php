<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Castle;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class CastleTest extends ChessTestCase
{
    /**
     * @var Castle
     */
    private Castle $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Castle(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is castle method
     */
    public function test_isCastle(): void
    {
        $this->assertTrue( $this->model->isCastle() );
    }
}
