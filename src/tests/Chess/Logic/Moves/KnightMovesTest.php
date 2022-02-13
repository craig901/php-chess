<?php namespace tests\Chess\Logic\Moves;

use App\Chess\Logic\Moves\KnightMoves;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Knight;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class KnightMovesTest extends ChessTestCase
{
    /**
     * @var KnightMoves
     */
    private KnightMoves $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new KnightMoves();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $piece = new Knight( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::E, Coordinates::FOUR );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertTrue( $this->handler->canMove( $move ) );
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsFalse(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $piece = new Knight( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::C, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::E, Coordinates::SEVEN );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertFalse( $this->handler->canMove( $move ) );
    }
}
