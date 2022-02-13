<?php namespace tests\Chess\Models;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Log;
use App\Chess\Models\Player;
use App\Chess\Models\Promotion;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use App\Chess\Storage\LogTypes;
use tests\Chess\ChessTestCase;

class LogTest extends ChessTestCase
{
    /**
     * @var Log
     */
    private Log $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = new Log(LogTypes::MOVE );
    }

    /**
     * Test the set/get player methods
     */
    public function test_setGetPlayer(): void
    {
        $player = new Player( 'Joe Bloggs' );
        $this->model->setPlayer( $player );
        $result = $this->model->getPlayer();
        $this->assertEquals( $player, $result );
    }

    /**
     * Test get type method
     */
    public function test_getType(): void
    {
        $model = new Log( LogTypes::MOVE );
        $this->assertEquals( LogTypes::MOVE, $model->getType() );
    }

    /**
     * Test the set/get piece taken methods
     */
    public function test_setGetPieceTaken(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::TWO );
        $piece = new Pawn( Colours::BLACK, $coordinate );
        $this->model->setPieceTaken( $piece );
        $result = $this->model->getPieceTaken();
        $this->assertInstanceOf( Pawn::class, $result );
    }

    /**
     * Test the set/get from methods
     */
    public function test_setGetFrom(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::TWO );
        $this->model->setFrom( $coordinate );
        $result = $this->model->getFrom();
        $this->assertEquals( $coordinate, $result );
    }

    /**
     * Test the set/get to methods
     */
    public function test_setGetTo(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::TWO );
        $this->model->setTo( $coordinate );
        $result = $this->model->getTo();
        $this->assertEquals( $coordinate, $result );
    }

    /**
     * Test the set/get error methods
     */
    public function test_setGetError(): void
    {
        $error = 'Illegal move!';
        $this->model->setError( $error );
        $result = $this->model->getError();
        $this->assertEquals( $error, $result );
    }

    /**
     * Test the set/get castling methods
     */
    public function test_setGetCastling(): void
    {
        $this->model->setCastling( true );
        $this->assertTrue( $this->model->getCastling() );
    }

    /**
     * Test the set/get promotion methods
     */
    public function test_setGetPromotion(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::TWO );
        $piece = new Pawn( Colours::BLACK, $coordinate );
        $promotion = new Promotion( $coordinate, $piece );
        $this->model->setPromotion( $promotion );
        $result = $this->model->getPromotion();
        $this->assertEquals( $promotion, $result );
    }
}
