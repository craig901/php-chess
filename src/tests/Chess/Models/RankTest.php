<?php namespace tests\Chess\Models;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Models\Rank;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class RankTest extends ChessTestCase
{
    /**
     * @var Rank
     */
    private Rank $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Rank(
            Coordinates::A, Coordinates::ONE, Colours::BLACK
        );
    }

    /**
     * Test the set/get piece methods
     */
    public function test_setGetPiece(): void
    {
        $piece = new Pawn( Colours::BLACK, new Coordinate( Coordinates::A, Coordinates::TWO ) );
        $this->model->setPiece( $piece );
        $result = $this->model->getPiece();
        $this->assertEquals( $piece, $result );
    }

    /**
     * Test the remove piece method
     */
    public function test_removePiece(): void
    {
        $piece = new Pawn( Colours::BLACK, new Coordinate( Coordinates::A, Coordinates::TWO ) );
        $this->model->setPiece( $piece );
        $this->model->removePiece();
        $this->assertNull( $this->model->getPiece() );
    }

    /**
     * Test the get colour method
     */
    public function test_getColour(): void
    {
        $model = new Rank(
            Coordinates::A, Coordinates::ONE, Colours::BLACK
        );
        $this->assertEquals( Colours::BLACK, $model->getColor() );
    }

    /**
     * Test the coordinate matches method
     */
    public function test_coordinateMatches(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $model = new Rank(
            $coordinate->getFile(), $coordinate->getRank(), Colours::BLACK
        );
        $this->assertTrue( $model->coordinateMatches( $coordinate ) );
    }

}
