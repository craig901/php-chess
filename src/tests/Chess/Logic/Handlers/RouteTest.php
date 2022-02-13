<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\Route;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class RouteTest extends ChessTestCase
{
    /**
     * @var Route
     */
    protected Route $route;

    /**
     * @var Coordinate
     */
    protected Coordinate $coordinate;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->route = new Route();
        $this->coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
    }

    /**
     * Test add north method
     */
    public function test_addNorth(): void
    {
        $this->route->addN( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getN() );
    }

    /**
     * Test add north east method
     */
    public function test_addNorthEast(): void
    {
        $this->route->addNE( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getNE() );
    }

    /**
     * Test add east method
     */
    public function test_addEast(): void
    {
        $this->route->addE( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getE() );
    }

    /**
     * Test add south east method
     */
    public function test_addSouthEast(): void
    {
        $this->route->addSE( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getSE() );
    }

    /**
     * Test add south method
     */
    public function test_addSouth(): void
    {
        $this->route->addS( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getS() );
    }

    /**
     * Test add south west method
     */
    public function test_addSouthWest(): void
    {
        $this->route->addSW( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getSW() );
    }

    /**
     * Test add west method
     */
    public function test_addWest(): void
    {
        $this->route->addW( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getW() );
    }

    /**
     * Test add north west method
     */
    public function test_addNorthWest(): void
    {
        $this->route->addNW( $this->coordinate );
        $this->assertEquals( [ $this->coordinate ], $this->route->getNW() );
    }
}
