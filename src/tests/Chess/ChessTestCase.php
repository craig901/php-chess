<?php namespace tests\Chess;

use App\Chess\Config\GameConfig;
use App\Chess\Config\SetPieces;
use App\Chess\Models\Game;
use App\Chess\Models\Player;
use App\Chess\Storage\Colours;
use PHPUnit\Framework\TestCase;

class ChessTestCase extends TestCase
{
    protected function getFreshGame(): Game
    {
        $white = new Player( 'joe.bloggs' );
        $black = new Player( 'john.doe' );

        $config = new GameConfig();
        $config->setColor( Colours::BLACK );
        $config->setWhite( $white );
        $config->setBlack( $black );
        $game = new Game( $config );
        $setPieces = new SetPieces();
        $setPieces->setPieces( $game );
        return $game;
    }
}
