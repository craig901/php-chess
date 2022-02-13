<?php namespace App\Chess\Models;

class Player
{
    /**
     * @var string
     */
    private string $name;

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct( string $name )
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
