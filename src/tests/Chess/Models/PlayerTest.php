<?php namespace tests\Chess\Models;

use App\Chess\Models\Player;
use tests\Chess\ChessTestCase;

class PlayerTest extends ChessTestCase
{
    /**
     * Test the get name method
     */
    public function test_getName(): void
    {
        $name = 'Joe Bloggs';
        $player = new Player( $name );
        $this->assertEquals( $name, $player->getName() );
    }
}
