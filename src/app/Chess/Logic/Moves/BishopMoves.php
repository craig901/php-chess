<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Move;

class BishopMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $rank = $this->board->getRank( $move->getFrom() );
        return $this->canMovePieceDiagonal( $move, $rank->getRoute() );
    }
}
