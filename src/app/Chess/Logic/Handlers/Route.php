<?php namespace App\Chess\Logic\Handlers;

use App\Chess\Models\Coordinate;

class Route {

    /**
     * @var array
     */
    public array $all = [];

    /**
     * @var array
     */
    public array $n = [];

    /**
     * @var array
     */
    public array $ne = [];

    /**
     * @var array
     */
    public array $e = [];

    /**
     * @var array
     */
    public array $se = [];

    /**
     * @var array
     */
    public array $s = [];

    /**
     * @var array
     */
    public array $sw = [];

    /**
     * @var array
     */
    public array $w = [];

    /**
     * @var array
     */
    public array $nw = [];

    /**
     * @return array
     */
    public function getN(): array
    {
        return $this->n;
    }

    /**
     * @return array
     */
    public function getNE(): array
    {
        return $this->ne;
    }

    /**
     * @return array
     */
    public function getE(): array
    {
        return $this->e;
    }

    /**
     * @return array
     */
    public function getSE(): array
    {
        return $this->se;
    }

    /**
     * @return array
     */
    public function getS(): array
    {
        return $this->s;
    }

    /**
     * @return array
     */
    public function getSW(): array
    {
        return $this->sw;
    }

    /**
     * @return array
     */
    public function getW(): array
    {
        return $this->w;
    }

    /**
     * @return array
     */
    public function getNW(): array
    {
        return $this->nw;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addN( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->n[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addNE( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->ne[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addE( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->e[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addSE( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->se[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addS( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->s[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addSW( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->sw[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addW( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->w[] = $coordinate;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function addNW( Coordinate $coordinate )
    {
        $this->all[] = $coordinate;
        $this->nw[] = $coordinate;
    }
}
