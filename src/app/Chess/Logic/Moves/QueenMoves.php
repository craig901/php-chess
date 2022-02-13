<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Move;

class QueenMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $rank = $this->board->getRank( $move->getFrom() );
        if(
            $this->canMovePieceHorizontal( $move, $rank->getRoute() ) ||
            $this->canMovePieceVertical( $move, $rank->getRoute() ) ||
            $this->canMovePieceDiagonal( $move, $rank->getRoute() )
        ) return true;
        return false;
    }
}
