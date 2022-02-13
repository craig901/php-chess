<?php namespace App\Chess\Models;

use App\Chess\Helpers\CoordinateHelper;

class Coordinate
{
    /**
     * File a,b,c etc
     * @var string
     */
    protected string $file;

    /**
     * Rank 1,2,3 etc
     * @var int
     */
    protected int $rank;

    /**
     * Coordinate constructor.
     *
     * @param string $file
     * @param int $rank
     */
    public function __construct( string $file, int $rank )
    {
        $this->file = $file;
        $this->rank = $rank;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @return integer
     */
    public function getRank(): int
    {
        return $this->rank;
    }

    /**
     * @param Coordinate $coordinate
     * @return bool
     */
    public function matches( Coordinate $coordinate ): bool
    {
        if( $this->file === $coordinate->getFile() && $this->rank === $coordinate->getRank() )
            return true;
        return false;
    }
}
