<?php namespace App\Chess\Logic;

use App\Chess\Logic\Moves\BishopMoves;
use App\Chess\Logic\Moves\CastleMoves;
use App\Chess\Logic\Moves\KingMoves;
use App\Chess\Logic\Moves\KnightMoves;
use App\Chess\Logic\Moves\PawnMoves;
use App\Chess\Logic\Moves\QueenMoves;

class Moves
{
    /**
     * @var PawnMoves
     */
    protected PawnMoves $pawn;

    /**
     * @var CastleMoves
     */
    protected CastleMoves $castle;

    /**
     * @var KnightMoves
     */
    protected KnightMoves $knight;

    /**
     * @var BishopMoves
     */
    protected BishopMoves $bishop;

    /**
     * @var QueenMoves
     */
    protected QueenMoves $queen;

    /**
     * @var KingMoves
     */
    protected KingMoves $king;

    /**
     * Moves constructor.
     */
    public function __construct()
    {
        $this->pawn = new PawnMoves();
        $this->castle = new CastleMoves();
        $this->knight = new KnightMoves();
        $this->bishop = new BishopMoves();
        $this->queen = new QueenMoves();
        $this->king = new KingMoves();
    }

    /**
     * @return PawnMoves
     */
    public function getPawn(): PawnMoves
    {
        return $this->pawn;
    }

    /**
     * @return CastleMoves
     */
    public function getCastle(): CastleMoves
    {
        return $this->castle;
    }

    /**
     * @return KnightMoves
     */
    public function getKnight(): KnightMoves
    {
        return $this->knight;
    }

    /**
     * @return BishopMoves
     */
    public function getBishop(): BishopMoves
    {
        return $this->bishop;
    }

    /**
     * @return QueenMoves
     */
    public function getQueen(): QueenMoves
    {
        return $this->queen;
    }

    /**
     * @return KingMoves
     */
    public function getKing(): KingMoves
    {
        return $this->king;
    }
}
