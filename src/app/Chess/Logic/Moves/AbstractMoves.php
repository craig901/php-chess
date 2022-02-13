<?php namespace App\Chess\Logic\Moves;

use App\Chess\Logic\Handlers\BoardHandler;
use App\Chess\Logic\Handlers\Route;
use App\Chess\Models\Move;

abstract class AbstractMoves
{
    /**
     * @var BoardHandler
     */
    protected BoardHandler $board;

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
     * @return bool
     */
    protected function canMovePieceVertical( Move $move, Route $route ): bool
    {
        if( in_array( $move->getTo(), $route->getN() ) )
            return true;
        if( in_array( $move->getTo(), $route->getS() ) )
            return true;

        return false;
    }

    /**
     * @param Move $move
     * @param Route $route
     * @return bool
     */
    protected function canMovePieceHorizontal( Move $move, Route $route ): bool
    {
        if( in_array( $move->getTo(), $route->getE() ) )
            return true;
        if( in_array( $move->getTo(), $route->getW() ) )
            return true;

        return false;
    }

    /**
     * @param Move $move
     * @param Route $route
     * @return bool
     */
    protected function canMovePieceDiagonal( Move $move, Route $route ): bool
    {
        if( in_array( $move->getTo(), $route->getNE() ) )
            return true;
        if( in_array( $move->getTo(), $route->getSE() ) )
            return true;
        if( in_array( $move->getTo(), $route->getSW() ) )
            return true;
        if( in_array( $move->getTo(), $route->getNW() ) )
            return true;

        return false;
    }
}
