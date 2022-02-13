<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Move;
use App\Chess\Storage\Colours;

class PawnMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
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
        // Check correct direction
        if( $move->getFrom()->getRank() > $move->getTo()->getRank() )
        {
            return false;
        }

        // Check distance
        $x = $move->getTo()->getRank() - $move->getFrom()->getRank();
        if( $move->getPiece()->firstMove() )
        {
            if( $x > 2 )
            {
                return false;
            }
        }
        else
        {
            if( $x > 1 )
            {
                return false;
            }
        }

        // Check same file
        if( $move->getFrom()->getFile() != $move->getTo()->getFile() )
        {
            $coordinates = $this->board->getCoordinateHandler()->getPawnAttackCoordinates( Colours::WHITE, $move->getFrom() );
            foreach( $coordinates as $coordinate )
            {
                if( $coordinate->matches( $move->getTo() ) )
                {
                    if( $move->getGame()->getPieceByCoordinate( $move->getTo() ) )
                        return true;
                }
            }
            return false;
        }

        return true;
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function canMoveBlack( Move $move ): bool
    {
        // Check correct direction
        if( $move->getFrom()->getRank() < $move->getTo()->getRank() )
            return false;

        // Check distance
        $x = $move->getFrom()->getRank() - $move->getTo()->getRank();
        if( $move->getPiece()->firstMove() )
        {
            if( $x > 2 )
            {
                return false;
            }
        }
        else
        {
            if( $x > 1 )
            {
                return false;
            }
        }

        // Check same file
        if( $move->getFrom()->getFile() != $move->getTo()->getFile() )
        {
            $coordinates = $this->board->getCoordinateHandler()->getPawnAttackCoordinates( Colours::BLACK, $move->getFrom() );
            foreach( $coordinates as $coordinate )
            {
                if( $coordinate->matches( $move->getTo() ) )
                {
                    if( $move->getGame()->getPieceByCoordinate( $move->getTo() ) )
                        return true;
                }
            }
            return false;
        }

        return true;
    }
}
