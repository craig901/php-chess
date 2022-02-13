<?php namespace tests\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Models\File;
use App\Chess\Models\Player;
use App\Chess\Models\Rank;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class FileTest extends ChessTestCase
{
    /**
     * @var File
     */
    private File $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $white = new Player('shaquille.oatmeal');
        $black = new Player('fast_and_the_curious');

        $config = new GameConfig();
        $config->setColor(Colours::BLACK);
        $config->setWhite($white);
        $config->setBlack($black);

        $this->model = new File( $config, Coordinates::A, Colours::WHITE );
    }

    /**
     * Test method returns an array of ranks
     */
    public function test_getRanks_returnsRanks(): void
    {
        $ranks = $this->model->getRanks();

        $this->assertIsArray( $ranks );
        $this->assertInstanceOf( Rank::class, $ranks[ 0 ] );
    }
}
