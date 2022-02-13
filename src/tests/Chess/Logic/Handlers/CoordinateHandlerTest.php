<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\CoordinateHandler;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class CoordinateHandlerTest extends ChessTestCase
{
    /**
     * Test that 2 files are returned, 1 either side of supplied coordinate
     */
    public function test_getPotentialFiles_returnsFiles(): void
    {
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $actual = CoordinateHandler::getPotentialFiles( $coordinate );
        $expected = [ Coordinates::C, Coordinates::E ];
        $this->assertEquals( $expected, $actual );
    }

    /**
     * Test that 2 attack coordinates are returned for a pawn
     */
    public function test_getPawnAttackCoordinates_returnsValidCoordinates()
    {
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $actual = CoordinateHandler::getPawnAttackCoordinates( Colours::WHITE, $coordinate );
        $expected = [
            new Coordinate( Coordinates::C, Coordinates::SIX ),
            new Coordinate( Coordinates::E, Coordinates::SIX )
        ];
        $this->assertEquals( $expected, $actual );
    }
}
