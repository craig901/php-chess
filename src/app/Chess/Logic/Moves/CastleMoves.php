<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Move;

class CastleMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $rank = $this->board->getRank( $move->getFrom() );
        if( $this->canMovePieceVertical( $move, $rank->getRoute() ) ||
            $this->canMovePieceHorizontal( $move, $rank->getRoute() ) )
            return true;
        return false;
    }
}
