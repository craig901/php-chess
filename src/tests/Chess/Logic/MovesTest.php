<?php namespace tests\Chess\Logic;

use App\Chess\Logic\Moves;
use App\Chess\Logic\Moves\BishopMoves;
use App\Chess\Logic\Moves\CastleMoves;
use App\Chess\Logic\Moves\KingMoves;
use App\Chess\Logic\Moves\KnightMoves;
use App\Chess\Logic\Moves\PawnMoves;
use App\Chess\Logic\Moves\QueenMoves;
use tests\Chess\ChessTestCase;

class MovesTest extends ChessTestCase
{
    /**
     * @var Moves
     */
    private Moves $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new Moves();
    }

    /**
     * Test method returns handler
     */
    public function test_getPawn_returnsMoves(): void
    {
        $this->assertInstanceOf( PawnMoves::class, $this->handler->getPawn() );
    }

    /**
     * Test method returns handler
     */
    public function test_getCastle_returnsMoves(): void
    {
        $this->assertInstanceOf( CastleMoves::class, $this->handler->getCastle() );
    }

    /**
     * Test method returns handler
     */
    public function test_getKnight_returnsMoves(): void
    {
        $this->assertInstanceOf( KnightMoves::class, $this->handler->getKnight() );
    }

    /**
     * Test method returns handler
     */
    public function test_getBishop_returnsMoves(): void
    {
        $this->assertInstanceOf( BishopMoves::class, $this->handler->getBishop() );
    }

    /**
     * Test method returns handler
     */
    public function test_getQueen_returnsMoves(): void
    {
        $this->assertInstanceOf( QueenMoves::class, $this->handler->getQueen() );
    }

    /**
     * Test method returns handler
     */
    public function test_getKing_returnsMoves(): void
    {
        $this->assertInstanceOf( KingMoves::class, $this->handler->getKing() );
    }
}
