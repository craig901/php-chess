<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\Route;
use App\Chess\Logic\Handlers\RouteBuilder;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class RouteBuilderTest extends ChessTestCase
{
    /**
     * @var RouteBuilder
     */
    private RouteBuilder $builder;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $coordinate = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $this->builder = new RouteBuilder( $coordinate );
    }

    /**
     * Test the get route returns the route class
     */
    public function test_getRoute_returnsRoute(): void
    {
        $route = $this->builder->getRoute();
        $this->assertInstanceOf( Route::class, $route );
    }

    /**
     * Test the build north route applies the correct coordinates
     */
    public function test_buildN(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::D, Coordinates::FOUR ),
            new Coordinate( Coordinates::D, Coordinates::THREE ),
            new Coordinate( Coordinates::D, Coordinates::TWO ),
            new Coordinate( Coordinates::D, Coordinates::ONE ),
        ];
        $this->assertEquals( $expected, $route->getN() );
    }

    /**
     * Test the build north east route applies the correct coordinates
     */
    public function test_buildNE(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::E, Coordinates::FOUR ),
            new Coordinate( Coordinates::F, Coordinates::THREE ),
            new Coordinate( Coordinates::G, Coordinates::TWO ),
            new Coordinate( Coordinates::H, Coordinates::ONE ),
        ];
        $this->assertEquals( $expected, $route->getNE() );
    }

    /**
     * Test the build east route applies the correct coordinates
     */
    public function test_buildE(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::E, Coordinates::FIVE ),
            new Coordinate( Coordinates::F, Coordinates::FIVE ),
            new Coordinate( Coordinates::G, Coordinates::FIVE ),
            new Coordinate( Coordinates::H, Coordinates::FIVE ),
        ];
        $this->assertEquals( $expected, $route->getE() );
    }

    /**
     * Test the build south east route applies the correct coordinates
     */
    public function test_buildSE(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::E, Coordinates::SIX ),
            new Coordinate( Coordinates::F, Coordinates::SEVEN ),
            new Coordinate( Coordinates::G, Coordinates::EIGHT ),
        ];
        $this->assertEquals( $expected, $route->getSE() );
    }

    /**
     * Test the build south route applies the correct coordinates
     */
    public function test_buildS(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::D, Coordinates::SIX ),
            new Coordinate( Coordinates::D, Coordinates::SEVEN ),
            new Coordinate( Coordinates::D, Coordinates::EIGHT ),
        ];
        $this->assertEquals( $expected, $route->getS() );
    }

    /**
     * Test the build south west route applies the correct coordinates
     */
    public function test_buildSW(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::C, Coordinates::SIX ),
            new Coordinate( Coordinates::B, Coordinates::SEVEN ),
            new Coordinate( Coordinates::A, Coordinates::EIGHT ),
        ];
        $this->assertEquals( $expected, $route->getSW() );
    }

    /**
     * Test the build west route applies the correct coordinates
     */
    public function test_buildW(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::C, Coordinates::FIVE ),
            new Coordinate( Coordinates::B, Coordinates::FIVE ),
            new Coordinate( Coordinates::A, Coordinates::FIVE ),
        ];
        $this->assertEquals( $expected, $route->getW() );
    }

    /**
     * Test the build north west route applies the correct coordinates
     */
    public function test_buildNW(): void
    {
        $route = $this->builder->getRoute();
        $expected = [
            new Coordinate( Coordinates::C, Coordinates::FOUR ),
            new Coordinate( Coordinates::B, Coordinates::THREE ),
            new Coordinate( Coordinates::A, Coordinates::TWO ),
        ];
        $this->assertEquals( $expected, $route->getNW() );
    }

}
