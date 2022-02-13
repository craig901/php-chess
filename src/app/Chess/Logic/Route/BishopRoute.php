<?php namespace App\Chess\Logic\Route;

use App\Chess\Models\Move;

class BishopRoute extends AbstractRoute
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $rank = $this->board->getRank( $move->getFrom() );
        $coordinates = $this->getDiagonal( $move, $rank->getRoute() );
        return $this->canMovePiece( $move, $coordinates );
    }
}
