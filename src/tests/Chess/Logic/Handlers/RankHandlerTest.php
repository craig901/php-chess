<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\RankHandler;
use App\Chess\Logic\Handlers\Route;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class RankHandlerTest extends ChessTestCase
{
    /**
     * @var RankHandler
     */
    private RankHandler $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new RankHandler( Coordinates::D, Coordinates::FIVE );
    }

    /**
     * Test the getRoute returns a route class
     */
    public function test_getRoute_returnsRoute(): void
    {
        $route = $this->handler->getRoute();
        $this->assertInstanceOf( Route::class, $route );
    }

    /**
     * Test the check coordinate method returns true
     */
    public function test_checkCoordinate_returnsTrue(): void
    {
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $this->assertTrue( $this->handler->checkCoordinate( $coordinate ) );
    }

    /**
     * Test the check coordinate method returns false
     */
    public function test_checkCoordinate_returnsFalse(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $this->assertFalse( $this->handler->checkCoordinate( $coordinate ) );
    }

}
