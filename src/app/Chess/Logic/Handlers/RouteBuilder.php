<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Helpers\CoordinateHelper;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Board;

class RouteBuilder
{
    /**
     * @var Coordinate
     */
    private Coordinate $coordinate;

    /**
     * @var Route
     */
    private Route $route;

    /**
     * RouteBuilder constructor.
     * @param Coordinate $coordinate
     */
    public function __construct( Coordinate $coordinate )
    {
        $this->coordinate = $coordinate;
        $this->route = new Route;
        $this->buildN();
        $this->buildNE();
        $this->buildE();
        $this->buildSE();
        $this->buildS();
        $this->buildSW();
        $this->buildW();
        $this->buildNW();
    }

    /**
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * Build coordinates north of this coordinate
     */
    private function buildN(): void
    {
        foreach( array_reverse( Board::RANKS ) as $rank ) {
            if( $rank < $this->coordinate->getRank() )
                $this->route->addN( new Coordinate( $this->coordinate->getFile(), $rank ) );
        }
    }

    /**
     * Build coordinates north east of this coordinate
     */
    private function buildNE(): void
    {
        $file = CoordinateHelper::getNextFile( $this->coordinate->getFile() );
        foreach( array_reverse( Board::RANKS ) as $rank ) {
            if( $rank < $this->coordinate->getRank() ) {
                if( $file ) {
                    $coordinate = new Coordinate( $file, $rank );
                    $this->route->addNE( $coordinate );
                    $file = CoordinateHelper::getNextFile( $file );
                }
            }
        }
    }

    /**
     * Build coordinates east of this coordinate
     */
    private function buildE(): void
    {
        foreach( Board::FILES as $file ) {
            if( $file > $this->coordinate->getFile() )
                $this->route->addE( new Coordinate( $file, $this->coordinate->getRank() ));
        }
    }

    /**
     * Build coordinates south east of this coordinate
     */
    private function buildSE(): void
    {
        $file = CoordinateHelper::getNextFile( $this->coordinate->getFile() );
        foreach( Board::RANKS as $rank ) {
            if( $rank > $this->coordinate->getRank() ) {
                if( $file ) {
                    $coordinate = new Coordinate( $file, $rank );
                    $this->route->addSE( $coordinate );
                    $file = CoordinateHelper::getNextFile( $file );
                }
            }
        }
    }

    /**
     * Build coordinates south of this coordinate
     */
    private function buildS(): void
    {
        foreach( Board::RANKS as $rank ) {
            if( $rank > $this->coordinate->getRank() )
                $this->route->addS( new Coordinate( $this->coordinate->getFile(), $rank ) );
        }
    }

    /**
     * Build coordinates south west of this coordinate
     */
    private function buildSW(): void
    {
        $file = CoordinateHelper::getPreviousFile( $this->coordinate->getFile() );
        foreach( Board::RANKS as $rank ) {
            if( $rank > $this->coordinate->getRank() ) {
                if( $file ) {
                    $coordinate = new Coordinate( $file, $rank );
                    $this->route->addSW( $coordinate );
                    $file = CoordinateHelper::getPreviousFile( $file );
                }
            }
        }
    }

    /**
     * Build coordinates west of this coordinate
     */
    private function buildW(): void
    {
        foreach( array_reverse( Board::FILES ) as $file ) {
            if( $file < $this->coordinate->getFile() )
                $this->route->addW( new Coordinate( $file, $this->coordinate->getRank() ));
        }
    }

    /**
     * Build coordinates north west of this coordinate
     */
    private function buildNW(): void
    {
        $file = CoordinateHelper::getPreviousFile( $this->coordinate->getFile() );
        foreach( array_reverse( Board::RANKS ) as $rank ) {
            if( $rank < $this->coordinate->getRank() ) {
                if( $file ) {
                    $coordinate = new Coordinate( $file, $rank );
                    $this->route->addNW( $coordinate );
                    $file = CoordinateHelper::getPreviousFile( $file );
                }
            }
        }
    }
}
