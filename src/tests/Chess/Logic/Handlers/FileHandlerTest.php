<?php namespace tests\Chess\Logic\Handlers;

use App\Chess\Logic\Handlers\FileHandler;
use App\Chess\Logic\Handlers\RankHandler;
use App\Chess\Models\Coordinate;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class FileHandlerTest extends ChessTestCase
{
    /**
     * @var FileHandler
     */
    private FileHandler $handler;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->handler = new FileHandler( Coordinates::H );
    }

    /**
     * Test checkFile returns true
     */
    public function test_checkFile_returnsTrue(): void
    {
        $this->assertTrue( $this->handler->checkFile( Coordinates::H ) );
    }

    /**
     * Test checkFile returns false
     */
    public function test_checkFile_returnsFalse(): void
    {
        $this->assertFalse( $this->handler->checkFile( Coordinates::A ) );
    }

    /**
     * Test the get rank method returns a rank handler class
     */
    public function test_getRank_returnsRankHandler(): void
    {
        $coordinate = new Coordinate( Coordinates::H, Coordinates::ONE );
        $rankHandler = $this->handler->getRank( $coordinate );
        $this->assertInstanceOf( RankHandler::class, $rankHandler );
    }


}
