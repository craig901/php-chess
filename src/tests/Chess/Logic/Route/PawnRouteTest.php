<?php namespace tests\Chess\Logic\Route;

use App\Chess\Logic\Route\PawnRoute;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class PawnRouteTest extends ChessTestCase
{
    /**
     * @var PawnRoute
     */
    private PawnRoute $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new PawnRoute();
    }

    /**
     * A legal move returns true
     */
    public function test_Handler_ReturnsTrue(): void
    {
        $game = $this->getFreshGame();
        $coordinate = new Coordinate( Coordinates::B, Coordinates::TWO );
        $piece = new Pawn( Colours::WHITE, $coordinate );
        $from = new Coordinate( Coordinates::B, Coordinates::TWO );
        $to = new Coordinate( Coordinates::B, Coordinates::FOUR );
        $move = new Move( $game, $piece, $from, $to );

        $this->assertTrue( $this->handler->canMove( $move ) );
    }

    /**
     * An illegal move returns false
     */
    public function test_Handler_ReturnsFalse(): void
    {
        $game = $this->getFreshGame();

        // Move 1 - white pawn
        $from = new Coordinate( Coordinates::D, Coordinates::TWO );
        $piece = $game->getPieceByCoordinate( $from );
        $to = new Coordinate( Coordinates::D, Coordinates::THREE );
        $move = new Move( $game, $piece, $from, $to );
        $game->move( $move );

        // Move 2 - black pawn
        $from = new Coordinate( Coordinates::E, Coordinates::SEVEN );
        $piece = $game->getPieceByCoordinate( $from );
        $to = new Coordinate( Coordinates::E, Coordinates::SIX );
        $move = new Move( $game, $piece, $from, $to );
        $game->move( $move );

        // Move 3 - white bishop
        $from = new Coordinate( Coordinates::C, Coordinates::ONE );
        $piece = $game->getPieceByCoordinate( $from );
        $to = new Coordinate( Coordinates::H, Coordinates::SIX );
        $move = new Move( $game, $piece, $from, $to );
        $game->move( $move );

        // Move 4 - black pawn (bishop in the way)
        $from = new Coordinate( Coordinates::H, Coordinates::SEVEN );
        $piece = $game->getPieceByCoordinate( $from );
        $to = new Coordinate( Coordinates::H, Coordinates::FIVE );
        $move = new Move( $game, $piece, $from, $to );
        $game->move( $move );

        $move = new Move( $game, $piece, $from, $to );

        $this->assertFalse( $this->handler->canMove( $move ) );
    }
}
