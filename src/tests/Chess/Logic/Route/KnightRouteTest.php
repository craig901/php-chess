<?php namespace tests\Chess\Logic\Route;

use App\Chess\Logic\Route\KnightRoute;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Knight;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class KnightRouteTest extends ChessTestCase
{
    /**
     * @var KnightRoute
     */
    private KnightRoute $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new KnightRoute();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::B, Coordinates::ONE);
        $piece = new Knight( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::B, Coordinates::ONE );
        $to = new Coordinate( Coordinates::C, Coordinates::THREE );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertTrue( $this->handler->canMove( $move ) );
    }

    /**
     * An illegal move returns false
     */
    public function test_Handler_ReturnsFalse(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::B, Coordinates::ONE );
        $piece = new Knight( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::B, Coordinates::ONE );
        $to = new Coordinate( Coordinates::D, Coordinates::TWO );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertFalse( $this->handler->canMove( $move ) );
    }
}
