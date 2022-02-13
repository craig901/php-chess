<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Models\Coordinate;

class RankHandler
{
    /**
     * @var string
     */
    private string $file;

    /**
     * @var int
     */
    private int $rank;

    /**
     * @var RouteBuilder
     */
    public RouteBuilder $routeBuilder;

    /**
     * @var Route
     */
    public Route $route;

    /**
     * RankHandler constructor.
     * @param string $file
     * @param int $rank
     */
    public function __construct( string $file, int $rank )
    {
        $this->file = $file;
        $this->rank = $rank;
        $coordinate = new Coordinate( $file, $rank );
        $this->routeBuilder = new RouteBuilder( $coordinate );
        $this->route = $this->routeBuilder->getRoute();
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @param Coordinate $coordinate
     * @return bool
     */
    public function checkCoordinate( Coordinate $coordinate ): bool
    {
        if( $this->file == $coordinate->getFile() && $this->rank === $coordinate->getRank() )
            return true;
        return false;
    }
}
