<?php namespace tests\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Bishop;
use App\Chess\Pieces\Pawn;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use App\Chess\Storage\Pieces;
use App\Chess\Storage\PieceSymbols;
use tests\Chess\ChessTestCase;

class PieceTest extends ChessTestCase
{
    /**
     * @var Piece
     */
    private Piece $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Bishop(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) );
    }

    /**
     * Test the get start method
     */
    public function test_getStart(): void
    {
        $this->assertInstanceOf( Coordinate::class, $this->model->getStart() );
    }

    /**
     * Test the get key method
     */
    public function test_getKey(): void
    {
        $this->assertEquals( Pieces::BISHOP, $this->model->getKey() );
    }

    /**
     * Test the get colour method
     */
    public function test_getColour(): void
    {
        $this->assertEquals( Colours::BLACK, $this->model->getColour() );
    }

    /**
     * Test the get symbol method
     */
    public function test_getSymbol(): void
    {
        $this->assertEquals( PieceSymbols::BLACK_BISHOP, $this->model->getSymbol() );
    }

    /**
     * Test the get file method
     */
    public function test_getFile(): void
    {
        $this->assertEquals( Coordinates::A, $this->model->getFile() );
    }

    /**
     * Test the get rank method
     */
    public function test_getRank(): void
    {
        $this->assertEquals( Coordinates::ONE, $this->model->getRank() );
    }

    /**
     * Test the get moves method
     */
    public function test_getMoves(): void
    {
        $move = new Move(
            $this->getFreshGame(),
            new Pawn( Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) ),
            new Coordinate(Coordinates::A, Coordinates::TWO ),
            new Coordinate(Coordinates::A, Coordinates::FOUR )
        );

        $this->model->addMove( $move );
        $result = $this->model->getMoves();
        $this->assertInstanceOf( Move::class, $result[ 0 ] );
    }

    /**
     * Test the first move method returns true
     */
    public function test_firstMove_returnsTrue(): void
    {
        $this->assertTrue( $this->model->firstMove() );
    }

    /**
     * Test the first move method returns false
     */
    public function test_firstMove_returnsFalse(): void
    {
        $move = new Move(
            $this->getFreshGame(),
            new Pawn( Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE ) ),
            new Coordinate(Coordinates::A, Coordinates::TWO ),
            new Coordinate(Coordinates::A, Coordinates::FOUR )
        );

        $this->model->addMove( $move );
        $this->assertFalse( $this->model->firstMove() );
    }

}
