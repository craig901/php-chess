<?php namespace App\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;

class File
{
    /**
     * @var GameConfig
     */
    protected GameConfig $config;

    /**
     * @var string
     */
    protected string $key;

    /**
     * @var string
     */
    protected string $colour;

    /**
     * @var Rank[]
     */
    public array $ranks = [];

    /**
     * File constructor.
     * @param GameConfig $config
     * @param $key
     * @param $startColor
     */
    public function __construct( GameConfig $config, $key, $startColor )
    {
        $this->config = $config;
        $this->key = $key;
        $this->colour = $startColor;

        $keys = [
            Coordinates::ONE,
            Coordinates::TWO,
            Coordinates::THREE,
            Coordinates::FOUR,
            Coordinates::FIVE,
            Coordinates::SIX,
            Coordinates::SEVEN,
            Coordinates::EIGHT
        ];

        if( $this->config->isPlayerBlack() )
        {
            $keys = array_reverse( $keys );
        }

        foreach( $keys as $key )
        {
            $this->ranks[] = new Rank( $this->key, $key, $this->colour );
            $this->colour = $this->colour == Colours::BLACK ? Colours::WHITE : Colours::BLACK;
        }
    }

    /**
     * @return string
     */
    public function GetKey()
    {
        return $this->key;
    }

    /**
     * @return Rank[]
     */
    public function getRanks()
    {
        return array_reverse( $this->ranks );
    }
}
