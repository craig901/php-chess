<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Pieces\Bishop;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class BishopTest extends ChessTestCase
{
    /**
     * @var Bishop
     */
    private Bishop $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Bishop(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the is bishop method
     */
    public function test_isBishop(): void
    {
        $this->assertTrue( $this->model->isBishop() );
    }
}
