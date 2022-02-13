<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Board;
use App\Chess\Storage\Colours;

class CoordinateHandler
{
    /**
     * @param Coordinate $coordinate
     * @param int $offset
     * @return array
     */
    public static function getPotentialFiles( Coordinate $coordinate, $offset = 1 ): array
    {
        $potentialFiles = [];

        foreach( Board::FILES as $key => $file )
        {
            if( $file === $coordinate->getFile() )
            {
                $fileLeft = isset( Board::FILES[$key - $offset] ) ? Board::FILES[$key - $offset] : null;
                $fileRight = isset( Board::FILES[$key + $offset] ) ? Board::FILES[$key + $offset] : null;
                if( $fileLeft )
                    $potentialFiles[] = $fileLeft;
                if( $fileRight )
                    $potentialFiles[] = $fileRight;
            }
        }

        return $potentialFiles;
    }

    /**
     * @param Coordinate $coordinate
     * @param $offset
     * @return array
     */
    public static function getPotentialRanks( Coordinate $coordinate, $offset ): array
    {
        $potentialRanks = [];

        foreach( Board::RANKS as $key => $rank )
        {
            if( $rank === $coordinate->getRank() )
            {
                $rankTop = isset( Board::RANKS[$key - $offset] ) ? Board::RANKS[$key - $offset] : null;
                $rankBottom = isset( Board::RANKS[$key + $offset] ) ? Board::RANKS[$key + $offset] : null;
                if( $rankTop )
                    $potentialRanks[] = $rankTop;
                if( $rankBottom )
                    $potentialRanks[] = $rankBottom;
            }
        }

        return $potentialRanks;
    }

    /**
     * @param string $color
     * @param Coordinate $coordinate
     * @return Coordinate[]
     */
    public static function getPawnAttackCoordinates( string $color, Coordinate $coordinate ): array
    {
        $return = [];

        $potentialFiles = self::getPotentialFiles( $coordinate );

        foreach( Board::RANKS as $key => $rank )
        {
            if( $rank === $coordinate->getRank() )
            {
                if( $color === Colours::BLACK )
                {
                    $index = $key - 1;
                    foreach( $potentialFiles as $potentialFile )
                    {
                        $return[] = new Coordinate( $potentialFile, Board::RANKS[$index] );
                    }
                }
                if( $color === Colours::WHITE )
                {
                    $index = $key + 1;
                    foreach( $potentialFiles as $potentialFile )
                    {
                        $return[] = new Coordinate( $potentialFile, Board::RANKS[$index] );
                    }
                }
            }
        }

        return $return;
    }

    /**
     * @param Coordinate $coordinate
     * @return array
     */
    public static function getKnightAttackCoordinates( Coordinate $coordinate ): array
    {
        $return = [];

        foreach( self::getPotentialFiles( $coordinate, 2 ) as $file )
        {
            $fileCoordinate = new Coordinate( $file, $coordinate->getRank() );
            foreach( self::getPotentialRanks( $fileCoordinate, 1 ) as $rank )
            {
                $return[] = new Coordinate( $file, $rank );
            }
        }

        foreach( self::getPotentialRanks( $coordinate, 2 ) as $rank )
        {
            $rankCoordinate = new Coordinate( $coordinate->getFile(), $rank );
            foreach( self::getPotentialFiles( $rankCoordinate, 1 ) as $file )
            {
                $return[] = new Coordinate( $file, $rank );
            }
        }

        return $return;
    }

    /**
     * @param Coordinate $coordinate
     * @return array
     */
    public static function getKingAttackCoordinates( Coordinate $coordinate ): array
    {
        $return = [];
        $ranks = self::getPotentialRanks( $coordinate, 1 );
        $ranks[] = $coordinate->getRank();
        $files = self::getPotentialFiles( $coordinate, 1 );
        $files[] = $coordinate->getFile();

        foreach( $ranks as $rank )
        {
            foreach( $files as $file )
            {
                $return[] = new Coordinate( $file, $rank );
            }
        }

        return $return;
    }
}
