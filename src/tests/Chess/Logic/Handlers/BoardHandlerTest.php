<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\BoardHandler;
use App\Chess\Logic\Handlers\CoordinateHandler;
use App\Chess\Logic\Handlers\RankHandler;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class BoardHandlerTest extends ChessTestCase
{
    /**
     * @var BoardHandler
     */
    private BoardHandler $handler;

    /**
     * @var RankHandler
     */
    private RankHandler $rankHandler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = BoardHandler::getInstance();
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $this->rankHandler = $this->handler->getRank( $coordinate );
    }

    public function test_getRank_returnsRankHandler(): void
    {
        $this->assertInstanceOf( RankHandler::class, $this->rankHandler );
    }

    public function test_getCoordinateHandler_returnsCoordinateHandler(): void
    {
        $handler = $this->handler->getCoordinateHandler();
        $this->assertInstanceOf( CoordinateHandler::class, $handler );
    }

    public function test_route_returnsCorrectNorthCoordinates(): void
    {
        $north = [
            new Coordinate( Coordinates::D, Coordinates::FOUR ),
            new Coordinate( Coordinates::D, Coordinates::THREE ),
            new Coordinate( Coordinates::D, Coordinates::TWO ),
            new Coordinate( Coordinates::D, Coordinates::ONE )
        ];

        $this->assertEquals( $north, $this->rankHandler->getRoute()->getN() );
    }

    public function test_route_returnsCorrectNorthEastCoordinates(): void
    {
        $northEast = [
            new Coordinate( Coordinates::E, Coordinates::FOUR ),
            new Coordinate( Coordinates::F, Coordinates::THREE ),
            new Coordinate( Coordinates::G, Coordinates::TWO ),
            new Coordinate( Coordinates::H, Coordinates::ONE )
        ];

        $this->assertEquals( $northEast, $this->rankHandler->getRoute()->getNE() );
    }

    public function test_route_returnsCorrectEastCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::E, Coordinates::FIVE ),
            new Coordinate( Coordinates::F, Coordinates::FIVE ),
            new Coordinate( Coordinates::G, Coordinates::FIVE ),
            new Coordinate( Coordinates::H, Coordinates::FIVE ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getE() );
    }

    public function test_route_returnsCorrectSouthEastCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::E, Coordinates::SIX ),
            new Coordinate( Coordinates::F, Coordinates::SEVEN ),
            new Coordinate( Coordinates::G, Coordinates::EIGHT ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getSE() );
    }

    public function test_route_returnsCorrectSouthCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::D, Coordinates::SIX ),
            new Coordinate( Coordinates::D, Coordinates::SEVEN ),
            new Coordinate( Coordinates::D, Coordinates::EIGHT ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getS() );
    }

    public function test_route_returnsCorrectSouthWestCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::C, Coordinates::SIX ),
            new Coordinate( Coordinates::B, Coordinates::SEVEN ),
            new Coordinate( Coordinates::A, Coordinates::EIGHT ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getSW() );
    }

    public function test_route_returnsCorrectWestCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::C, Coordinates::FIVE ),
            new Coordinate( Coordinates::B, Coordinates::FIVE ),
            new Coordinate( Coordinates::A, Coordinates::FIVE ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getW() );
    }

    public function test_route_returnsCorrectNorthWestCoordinates(): void
    {
        $east = [
            new Coordinate( Coordinates::C, Coordinates::FOUR ),
            new Coordinate( Coordinates::B, Coordinates::THREE ),
            new Coordinate( Coordinates::A, Coordinates::TWO ),
        ];

        $this->assertEquals( $east, $this->rankHandler->getRoute()->getNW() );
    }

}
