<?php namespace tests\Chess\Logic\Route;

use App\Chess\Logic\Route\QueenRoute;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Queen;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class QueenRouteTest extends ChessTestCase
{
    /**
     * @var QueenRoute
     */
    private QueenRoute $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new QueenRoute();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $piece = new Queen( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::D, Coordinates::FIVE );
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
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $piece = new Queen( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::D, Coordinates::EIGHT );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertFalse( $this->handler->canMove( $move ) );
    }
}
