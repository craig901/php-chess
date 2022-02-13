<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Models\Coordinate;
use App\Chess\Storage\Board;

class BoardHandler
{
    /**
     * @var BoardHandler
     */
    private static $instance;

    /**
     * @var CoordinateHandler
     */
    protected CoordinateHandler $coordinateHandler;

    /**
     * @var FileHandler[]
     */
    public array $files = [];

    /**
     * BoardHandler constructor.
     */
    private function __construct()
    {
        $this->coordinateHandler = new CoordinateHandler;
        foreach( Board::FILES as $file )
        {
            $this->files[] = new FileHandler( $file );
        }
    }

    /**
     * @return BoardHandler
     */
    public static function getInstance(): self
    {
        if( self::$instance == null )
            self::$instance = new self();
        return self::$instance;
    }

    /**
     * @param Coordinate $coordinate
     * @return RankHandler|false
     */
    public function getRank( Coordinate $coordinate )
    {
        $rank = false;
        foreach( $this->files as $item )
        {
            if( $item->checkFile( $coordinate->getFile() ) )
            {
                $rank = $item->getRank( $coordinate );
            }
        }
        return $rank;
    }

    /**
     * @return CoordinateHandler
     */
    public function getCoordinateHandler(): CoordinateHandler
    {
        return $this->coordinateHandler;
    }
}
