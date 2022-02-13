<?php namespace App\Chess\Helpers;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Board;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;

class CoordinateHelper
{
    /**
     * @param $val
     * @return int
     */
    public static function GetNumber( $val ): int
    {
        switch( $val )
        {
            case Coordinates::A:
            case Coordinates::ONE;
                return 1;
            case Coordinates::B:
            case Coordinates::TWO;
                return 2;
            case Coordinates::C:
            case Coordinates::THREE;
                return 3;
            case Coordinates::D:
            case Coordinates::FOUR;
                return 4;
            case Coordinates::E:
            case Coordinates::FIVE;
                return 5;
            case Coordinates::F:
            case Coordinates::SIX;
                return 6;
            case Coordinates::G:
            case Coordinates::SEVEN;
                return 7;
            case Coordinates::H:
            case Coordinates::EIGHT;
                return 8;
        }
    }

    /**
     * @param string $x
     * @param int $y
     * @return Coordinate
     */
    public static function getCoordinate( string $x, int $y ): Coordinate
    {
        return new Coordinate( $x, $y );
    }

    /**
     * @param string $file
     * @return false|mixed
     */
    public static function getPreviousFile( string $file ): ?string
    {
        $previous = false;
        foreach( Board::FILES as $key => $item )
        {
            if( $item === $file )
                $previous = isset( Board::FILES[ $key - 1 ] ) ? Board::FILES[ $key - 1 ] : false;
        }
        return $previous;
    }

    /**
     * @param string $file
     * @return false|mixed
     */
    public static function getNextFile( string $file ): ?string
    {
        $next = false;
        foreach( Board::FILES as $key => $item )
        {
            if( $item === $file )
                $next = isset( Board::FILES[ $key + 1 ] ) ? Board::FILES[ $key + 1 ] : false;
        }
        return $next;
    }
}
