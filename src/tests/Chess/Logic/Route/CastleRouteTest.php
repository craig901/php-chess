<?php namespace tests\Chess\Logic\Route;

use App\Chess\Logic\Route\CastleRoute;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Castle;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class CastleRouteTest extends ChessTestCase
{
    /**
     * @var CastleRoute
     */
    private CastleRoute $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new CastleRoute();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $piece = new Castle( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::H, Coordinates::FIVE );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertTrue( $this->handler->canMove( $move ) );
    }

    /**
     * An illegal move returns false
     */
    public function test_Handler_ReturnsFalse(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::C, Coordinates::ONE );
        $piece = new Castle( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::A, Coordinates::ONE );
        $to = new Coordinate( Coordinates::A, Coordinates::THREE );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertFalse( $this->handler->canMove( $move ) );
    }
}
