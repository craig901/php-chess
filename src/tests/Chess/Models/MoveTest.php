<?php namespace tests\Chess\Models;

use App\Chess\Logic\Moves\Special\Castling;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Game;
use App\Chess\Models\Log;
use App\Chess\Models\Move;
use App\Chess\Models\Player;
use App\Chess\Models\Promotion;
use App\Chess\Pieces\Pawn;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use App\Chess\Storage\LogTypes;
use App\Chess\Storage\Pieces;
use tests\Chess\ChessTestCase;

class MoveTest extends ChessTestCase
{
    /**
     * @var Move
     */
    private Move $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Move(
            $this->getFreshGame(),
            new Pawn(Colours::BLACK,
                new Coordinate(Coordinates::A, Coordinates::TWO)),
            new Coordinate(Coordinates::A, Coordinates::TWO),
            new Coordinate(Coordinates::A, Coordinates::THREE)
        );
    }

    /**
     * Test the get game method
     */
    public function test_getGame(): void
    {
        $result = $this->model->getGame();
        $this->assertInstanceOf( Game::class, $result );
    }

    /**
     * Test the get piece method
     */
    public function test_getPiece(): void
    {
        $result = $this->model->getPiece();
        $this->assertInstanceOf( Piece::class, $result );
    }

    /**
     * Test the get from method
     */
    public function test_getFrom(): void
    {
        $result = $this->model->getFrom();
        $this->assertInstanceOf( Coordinate::class, $result );
    }

    /**
     * Test the get to method
     */
    public function test_getTo(): void
    {
        $result = $this->model->getTo();
        $this->assertInstanceOf( Coordinate::class, $result );
    }

    /**
     * Test the set/get piece to take
     */
    public function test_setGetPieceToTake(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::TWO );
        $piece = new Pawn( Colours::BLACK, $coordinate );
        $this->model->setPieceToTake( $piece );
        $result = $this->model->getPieceToTake();
        $this->assertEquals( $piece, $result );
    }

    /**
     * Test the set/get castling methods
     */
    public function test_setGetCastling(): void
    {
        $from = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::D, Coordinates::FOUR );
        $piece = new Pawn( Colours::BLACK, $from );
        $move = new Move( $this->getFreshGame(), $piece, $from, $to );
        $castling = new Castling( $move );
        $this->model->setCastling( $castling );
        $result = $this->model->getCastling();
        $this->assertEquals( $castling, $result );
    }

    /**
     * Test the set/get promotion available methods
     */
    public function test_setGetPromotionAvailable(): void
    {
        $this->model->setPromotionAvailable( true );
        $this->assertTrue( $this->model->getPromotionAvailable() );
    }
}
