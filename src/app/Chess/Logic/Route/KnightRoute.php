<?php namespace App\Chess\Logic\Route;

use App\Chess\Models\Move;

class KnightRoute extends AbstractRoute
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        return $this->canMovePiece( $move, [ $move->getTo() ] );
    }
}
