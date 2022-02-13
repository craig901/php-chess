<?php namespace tests\Chess\Logic;

use App\Chess\Logic\Route;
use App\Chess\Logic\Route\BishopRoute;
use App\Chess\Logic\Route\CastleRoute;
use App\Chess\Logic\Route\KingRoute;
use App\Chess\Logic\Route\KnightRoute;
use App\Chess\Logic\Route\PawnRoute;
use App\Chess\Logic\Route\QueenRoute;
use tests\Chess\ChessTestCase;

class RouteTest extends ChessTestCase
{
    /**
     * @var Route
     */
    private Route $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new Route();
    }

    /**
     * Test method returns handler
     */
    public function test_getPawn_returnsMoves(): void
    {
        $this->assertInstanceOf( PawnRoute::class, $this->handler->getPawn() );
    }

    /**
     * Test method returns handler
     */
    public function test_getCastle_returnsMoves(): void
    {
        $this->assertInstanceOf( CastleRoute::class, $this->handler->getCastle() );
    }

    /**
     * Test method returns handler
     */
    public function test_getKnight_returnsMoves(): void
    {
        $this->assertInstanceOf( KnightRoute::class, $this->handler->getKnight() );
    }

    /**
     * Test method returns handler
     */
    public function test_getBishop_returnsMoves(): void
    {
        $this->assertInstanceOf( BishopRoute::class, $this->handler->getBishop() );
    }

    /**
     * Test method returns handler
     */
    public function test_getQueen_returnsMoves(): void
    {
        $this->assertInstanceOf( QueenRoute::class, $this->handler->getQueen() );
    }

    /**
     * Test method returns handler
     */
    public function test_getKing_returnsMoves(): void
    {
        $this->assertInstanceOf( KingRoute::class, $this->handler->getKing() );
    }
}
