<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Move;

class KnightMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $coordinates = $this->board->getCoordinateHandler()->getKnightAttackCoordinates( $move->getFrom() );
        foreach( $coordinates as $coordinate )
        {
            if( $move->getTo()->matches( $coordinate ) )
            {
                return true;
            }
        }
        return false;
    }
}
