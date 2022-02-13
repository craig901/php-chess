<?php namespace App\Chess\Logic;

use App\Chess\Logic\Route\BishopRoute;
use App\Chess\Logic\Route\CastleRoute;
use App\Chess\Logic\Route\KingRoute;
use App\Chess\Logic\Route\KnightRoute;
use App\Chess\Logic\Route\PawnRoute;
use App\Chess\Logic\Route\QueenRoute;

class Route
{
    /**
     * @var PawnRoute
     */
    protected PawnRoute $pawn;

    /**
     * @var CastleRoute
     */
    protected CastleRoute $castle;

    /**
     * @var KnightRoute
     */
    protected KnightRoute $knight;

    /**
     * @var BishopRoute
     */
    protected BishopRoute $bishop;

    /**
     * @var QueenRoute
     */
    protected QueenRoute $queen;

    /**
     * @var KingRoute
     */
    protected KingRoute $king;

    /**
     * Moves constructor.
     */
    public function __construct()
    {
        $this->pawn = new PawnRoute();
        $this->castle = new CastleRoute();
        $this->knight = new KnightRoute();
        $this->bishop = new BishopRoute();
        $this->queen = new QueenRoute();
        $this->king = new KingRoute();
    }

    /**
     * @return PawnRoute
     */
    public function getPawn(): PawnRoute
    {
        return $this->pawn;
    }

    /**
     * @return CastleRoute
     */
    public function getCastle(): CastleRoute
    {
        return $this->castle;
    }

    /**
     * @return KnightRoute
     */
    public function getKnight(): KnightRoute
    {
        return $this->knight;
    }

    /**
     * @return BishopRoute
     */
    public function getBishop(): BishopRoute
    {
        return $this->bishop;
    }

    /**
     * @return QueenRoute
     */
    public function getQueen(): QueenRoute
    {
        return $this->queen;
    }

    /**
     * @return KingRoute
     */
    public function getKing(): KingRoute
    {
        return $this->king;
    }
}
