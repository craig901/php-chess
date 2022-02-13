<?php namespace App\Chess\Logic\Moves;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;

class KingMoves extends AbstractMoves
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        if( $move->getPiece()->firstMove() )
        {
            if( $this->isCastling( $move ) )
                return true;
        }
        $coordinates = $this->board->getCoordinateHandler()->getKingAttackCoordinates( $move->getFrom() );
        return $this->checkCoordinates( $move, $coordinates );
    }

    /**
     * @param Move $move
     * @return bool
     */
    public function isCastling( Move $move ): bool
    {
        $coordinates = $this->getCastlingCoordinates( $move );
        return $this->checkCoordinates( $move, $coordinates );
    }

    /**
     * @param Move $move
     * @param $coordinates
     * @return bool
     */
    private function checkCoordinates( Move $move, $coordinates ): bool
    {
        foreach( $coordinates as $coordinate )
        {
            if( $move->getTo()->matches( $coordinate ) )
            {
                return true;
            }
        }
        return false;
    }

    /**
     * @param Move $move
     * @return array|Coordinate[]
     */
    private function getCastlingCoordinates( Move $move ): array
    {
        $coordinates = [];
        if( $move->getPiece()->getColour() === Colours::WHITE )
        {
            $coordinates = [
                new Coordinate( Coordinates::B, Coordinates::ONE ),
                new Coordinate( Coordinates::G, Coordinates::ONE )
            ];
        }
        elseif ( $move->getPiece()->getColour() === Colours::WHITE )
        {
            $coordinates = [
                new Coordinate( Coordinates::B, Coordinates::EIGHT ),
                new Coordinate( Coordinates::G, Coordinates::EIGHT )
            ];
        }
        return $coordinates;
    }
}
