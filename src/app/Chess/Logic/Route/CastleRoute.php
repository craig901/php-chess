<?php namespace App\Chess\Logic\Route;

use App\Chess\Logic\Handlers\Route;
use App\Chess\Models\Move;

class CastleRoute extends AbstractRoute
{
    /**
     * @param Move $move
     * @return bool
     */
    public function canMove( Move $move ): bool
    {
        $rank = $this->board->getRank( $move->getFrom() );
        $coordinates = $this->getRoute( $move, $rank->getRoute() );
        return $this->canMovePiece( $move, $coordinates );
    }

    /**
     * @param Move $move
     * @param Route $route
     * @return array
     */
    private function getRoute( Move $move, Route $route ): array
    {
        if( in_array( $move->getTo(), $route->getN() ) )
            return $this->calculateRoute( $move->getTo(), $route->getN() );

        if( in_array( $move->getTo(), $route->getE() ) )
            return $this->calculateRoute( $move->getTo(), $route->getE() );

        if( in_array( $move->getTo(), $route->getS() ) )
            return $this->calculateRoute( $move->getTo(), $route->getS() );

        if( in_array( $move->getTo(), $route->getW() ) )
            return $this->calculateRoute( $move->getTo(), $route->getW() );
    }
}
