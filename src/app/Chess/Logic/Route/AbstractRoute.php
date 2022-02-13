<?php namespace App\Chess\Logic\Route;

use App\Chess\Logic\Handlers\BoardHandler;
use App\Chess\Logic\Handlers\Route;
use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;

abstract class AbstractRoute
{
    /**
     * @var BoardHandler
     */
    protected BoardHandler $board;

    /**
     * AbstractRoute constructor.
     */
    public function __construct()
    {
        $this->board = BoardHandler::getInstance();
    }

    /**
     * @param Move $move
     * @return boolean
     */
    abstract function canMove( Move $move ): bool;

    /**
     * @param Move $move
     * @param Route $route
     * @return array
     */
    protected function getDiagonal( Move $move, Route $route ): array
    {
        if( in_array( $move->getTo(), $route->getNE() ) )
            return $this->calculateRoute( $move->getTo(), $route->getNE() );

        if( in_array( $move->getTo(), $route->getSE() ) )
            return $this->calculateRoute( $move->getTo(), $route->getSE() );

        if( in_array( $move->getTo(), $route->getSW() ) )
            return $this->calculateRoute( $move->getTo(), $route->getSW() );

        if( in_array( $move->getTo(), $route->getNW() ) )
            return $this->calculateRoute( $move->getTo(), $route->getNW() );
    }

    /**
     * @param Move $move
     * @param Route $route
     * @return array
     */
    protected function getVertical( Move $move, Route $route ): array
    {
        if( in_array( $move->getTo(), $route->getN() ) )
            return $this->calculateRoute( $move->getTo(), $route->getN() );

        if( in_array( $move->getTo(), $route->getS() ) )
            return $this->calculateRoute( $move->getTo(), $route->getS() );
    }

    /**
     * @param Move $move
     * @param Route $route
     * @return array
     */
    protected function getHorizontal( Move $move, Route $route ): array
    {
        if( in_array( $move->getTo(), $route->getE() ) )
            return $this->calculateRoute( $move->getTo(), $route->getE() );

        if( in_array( $move->getTo(), $route->getW() ) )
            return $this->calculateRoute( $move->getTo(), $route->getW() );
    }

    /**
     * @param Coordinate $to
     * @param $coordinates
     * @return array
     */
    protected function calculateRoute( Coordinate $to, $coordinates ): array
    {
        $return = [];
        foreach( $coordinates as $coordinate )
        {
            if( $to->matches( $coordinate ) )
                return $return;
            $return[] = $coordinate;
        }
        return $return;
    }

    /**
     * @param Move $move
     * @param $coordinates
     * @return bool
     */
    protected function canMovePiece( Move $move, $coordinates ): bool
    {
        foreach ( $coordinates as $coordinate )
        {
            $piece = $move->getGame()->getPieceByCoordinate( $coordinate );
            if( $piece && !$move->getTo()->matches( $coordinate ) )
            {
                return false;
            }

            if( $piece && $move->getTo()->matches( $coordinate ) )
            {
                if ( $move->getPiece()->getColour() === $piece->getColour() )
                {
                    return false;
                }
            }
        }
        return true;
    }
}
