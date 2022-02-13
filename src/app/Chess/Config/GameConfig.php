<?php namespace App\Chess\Config;

use App\Chess\Models\Player;
use App\Chess\Storage\Colours;

class GameConfig
{
    /**
     * @var string
     */
    private string $color;

    /**
     * @var Player
     */
    private Player $white;

    /**
     * @var Player
     */
    private Player $black;

    /**
     * @param $color
     */
    public function setColor( $color )
    {
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param Player $player
     */
    public function setWhite( Player $player )
    {
        $this->white = $player;
    }

    /**
     * @param string $color
     * @return Player|null
     */
    public function getPlayerByColour( string $color ): ?Player
    {
        switch( $color )
        {
            case Colours::WHITE:
                return $this->white;
            case Colours::BLACK:
                return $this->black;
        }
    }

    /**
     * @return Player|null
     */
    public function getWhite(): ?Player
    {
        return $this->white;
    }

    /**
     * @return Player|null
     */
    public function getBlack(): ?Player
    {
        return $this->black;
    }

    /**
     * @param Player $player
     */
    public function setBlack( Player $player )
    {
        $this->black = $player;
    }

    /**
     * @return bool
     */
    public function isPlayerWhite(): bool
    {
        if( $this->color === Colours::WHITE )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isPlayerBlack(): bool
    {
        if( $this->color === Colours::BLACK )
            return true;
        return false;
    }
}
