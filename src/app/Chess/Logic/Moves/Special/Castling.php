<?php namespace App\Chess\Logic\Moves\Special;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Storage\Coordinates;

class Castling
{
    /**
     * @var Coordinate
     */
    protected Coordinate $kingFrom;

    /**
     * @var Coordinate
     */
    protected Coordinate $kingTo;

    /**
     * @var Coordinate
     */
    protected Coordinate $castleFrom;

    /**
     * @var Coordinate
     */
    protected Coordinate $castleTo;

    /**
     * Castling constructor.
     * @param Move $move
     */
    public function __construct( Move $move )
    {
        $this->kingFrom = $move->getFrom();
        $this->kingTo = $move->getTo();
        $this->setCastleCoordinates();
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setKingFrom( Coordinate $coordinate )
    {
        $this->kingFrom = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getKingFrom(): Coordinate
    {
        return $this->kingFrom;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setKingTo( Coordinate $coordinate )
    {
        $this->kingTo = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getKingTo(): Coordinate
    {
        return $this->kingTo;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setCastleFrom( Coordinate $coordinate )
    {
        $this->castleFrom = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getCastleFrom(): Coordinate
    {
        return $this->castleFrom;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setCastleTo( Coordinate $coordinate )
    {
        $this->castleTo = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getCastleTo(): Coordinate
    {
        return $this->castleTo;
    }

    /**
     * Sets the castle coordinates
     */
    private function setCastleCoordinates()
    {
        $b1 = new Coordinate( Coordinates::B, Coordinates::ONE );
        $g1 = new Coordinate( Coordinates::G, Coordinates::ONE );
        $b8 = new Coordinate( Coordinates::B, Coordinates::EIGHT );
        $g8 = new Coordinate( Coordinates::G, Coordinates::EIGHT );
        if( $this->kingTo->matches( $b1 ) )
        {
            $this->castleFrom = new Coordinate( Coordinates::A, Coordinates::ONE );
            $this->castleTo = new Coordinate( Coordinates::C, Coordinates::ONE );
        }

        if( $this->kingTo->matches( $g1 ) )
        {
            $this->castleFrom = new Coordinate( Coordinates::G, Coordinates::ONE );
            $this->castleTo = new Coordinate( Coordinates::E, Coordinates::ONE );
        }

        if( $this->kingTo->matches( $b8 ) )
        {
            $this->castleFrom = new Coordinate( Coordinates::A, Coordinates::EIGHT );
            $this->castleTo = new Coordinate( Coordinates::C, Coordinates::EIGHT );
        }

        if( $this->kingTo->matches( $g8 ) )
        {
            $this->castleFrom = new Coordinate( Coordinates::H, Coordinates::EIGHT );
            $this->castleTo = new Coordinate( Coordinates::F, Coordinates::EIGHT );
        }
    }
}
