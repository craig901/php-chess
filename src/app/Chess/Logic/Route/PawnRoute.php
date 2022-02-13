<?php namespace App\Chess\Logic\Route;

use App\Chess\Helpers\CoordinateHelper;
use App\Chess\Models\Move;
use App\Chess\Storage\Colours;

class PawnRoute extends AbstractRoute
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        if( $move->getFrom()->getFile() !== $move->getTo()->getFile() )
            return true;

        switch( $move->getPiece()->getColour() )
        {
            case Colours::WHITE:
                return $this->canMoveWhite( $move );

            case Colours::BLACK:
                return $this->canMoveBlack( $move );
        }

        return true;
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function canMoveWhite( Move $move ): bool
    {
        $count = CoordinateHelper::GetNumber( $move->getTo()->getRank() ) - CoordinateHelper::GetNumber( $move->getFrom()->getRank() );
        for( $i=0;$i<$count;$i++ )
        {
            $y = $move->getFrom()->getRank() + $i + 1;
            $coordinate = CoordinateHelper::getCoordinate( $move->getFrom()->getFile(), $y );
            $piece = $move->getGame()->getPieceByCoordinate( $coordinate );
            if( $piece )
            {
                return false;
            }
        }
        return true;
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function canMoveBlack( Move $move ): bool
    {
        $count = CoordinateHelper::GetNumber( $move->getFrom()->getRank() ) - CoordinateHelper::GetNumber( $move->getTo()->getRank() );
        for( $i=0;$i<$count;$i++ )
        {
            $y = $move->getTo()->getRank() + $i;
            $coordinate = CoordinateHelper::getCoordinate( $move->getFrom()->getFile(), $y );
            $piece = $move->getGame()->getPieceByCoordinate( $coordinate );
            if( $piece )
            {
                return false;
            }
        }
        return true;
    }
}
