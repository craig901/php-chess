<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Models\Coordinate;
use \App\Chess\Storage\Board;

class FileHandler
{
    /**
     * @var string
     */
    private string $file;

    /**
     * @var RankHandler[]
     */
    private array $ranks = [];

    public function __construct( $file )
    {
        $this->file = $file;
        foreach( Board::RANKS as $rank )
        {
            $this->ranks[] = new RankHandler( $file, $rank );
        }
    }

    /**
     * @param $file
     * @return bool
     */
    public function checkFile( $file ): bool
    {
        if( $this->file === $file )
            return true;
        return false;
    }

    /**
     * @param Coordinate $coordinate
     * @return RankHandler
     */
    public function getRank( Coordinate $coordinate ): RankHandler
    {
        foreach( $this->ranks as $item )
        {
            if( $item->checkCoordinate( $coordinate ) )
                return $item;
        }
    }
}
