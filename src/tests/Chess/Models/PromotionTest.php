<?php namespace tests\Chess\Models;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Promotion;
use App\Chess\Pieces\Pawn;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class PromotionTest extends ChessTestCase
{
    /**
     * @var Promotion
     */
    private Promotion $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Promotion(
            new Coordinate(Coordinates::A, Coordinates::ONE),
            new Pawn(Colours::BLACK, new Coordinate(Coordinates::A, Coordinates::ONE))
        );
    }

    /**
     * Test the get coordinate method
     */
    public function test_getCoordinate(): void
    {
        $this->assertInstanceOf( Coordinate::class, $this->model->getCoordinate() );
    }

    /**
     * Test the get piece method
     */
    public function test_getPiece(): void
    {
        $this->assertInstanceOf(Piece::class, $this->model->getPiece() );
    }
}
