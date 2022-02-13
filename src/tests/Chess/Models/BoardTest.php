<?php namespace tests\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Logic\Moves\Special\Castling;
use App\Chess\Models\Board;
use App\Chess\Models\Coordinate;
use App\Chess\Models\File;
use App\Chess\Models\Move;
use App\Chess\Models\Player;
use App\Chess\Pieces\Castle;
use App\Chess\Pieces\King;
use App\Chess\Pieces\Pawn;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use tests\Chess\ChessTestCase;

class BoardTest extends ChessTestCase
{
    /**
     * @var Board
     */
    private Board $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $white = new Player( 'shaquille.oatmeal' );
        $black = new Player( 'fast_and_the_curious' );

        $config = new GameConfig();
        $config->setColor( Colours::BLACK );
        $config->setWhite( $white );
        $config->setBlack( $black );

        $this->model = new Board( $config );
    }

    /**
     * Test method returns files array
     */
    public function test_getFiles_returnsFilesArray(): void
    {
        $files = $this->model->getFiles();
        $this->assertInstanceOf( File::class, $files[ 0 ] );
    }

    /**
     * Test method returns a piece
     */
    public function test_move_returnsAPiece(): void
    {
        $game = $this->getFreshGame();

        $from = new Coordinate( Coordinates::D, Coordinates::FIVE );
        $to = new Coordinate( Coordinates::D, Coordinates::FOUR );
        $piece = new Pawn( Colours::BLACK, $from );
        $move = new Move( $game, $piece, $from, $to );
        $this->model->move( $move );

        $result = $this->model->getPieceByCoordinate( $to );
        $this->assertInstanceOf( Pawn::class, $result );
    }

    /**
     * Test method returns a piece that is taken in a move
     */
    public function test_takePiece_returnsPiece(): void
    {
        $game = $this->getFreshGame();

        $from = new Coordinate( Coordinates::A, Coordinates::ONE );
        $to = new Coordinate( Coordinates::A, Coordinates::EIGHT );
        $piece = new Castle( Colours::WHITE, $from );
        $move = new Move( $game, $piece, $from, $to );

        $taken = $game->board->takePiece( $move );
        $this->assertInstanceOf( Castle::class, $taken );
   }

    /**
     * Test method moves a piece
     */
    public function test_move_movesPiece(): void
    {
        $game = $this->getFreshGame();

        $from = new Coordinate( Coordinates::A, Coordinates::ONE );
        $to = new Coordinate( Coordinates::A, Coordinates::FIVE );
        $piece = new Castle( Colours::WHITE, $from );
        $move = new Move( $game, $piece, $from, $to );

        $game->board->move( $move );
        $movedPiece = $game->board->getPieceByCoordinate( $to );
        $this->assertInstanceOf( Castle::class, $movedPiece );
    }

    /**
     * Test castling move
     */
    public function test_move_castles(): void
    {
        $game = $this->getFreshGame();

        $from = new Coordinate( Coordinates::D, Coordinates::EIGHT );
        $to = new Coordinate( Coordinates::B, Coordinates::EIGHT );
        $piece = new King( Colours::WHITE, $from );
        $move = new Move( $game, $piece, $from, $to );

        $castling = new Castling( $move );
        $move->setCastling( $castling );

        $game->board->move( $move );
        $movedPiece = $game->board->getPieceByCoordinate( $to );
        $this->assertInstanceOf( King::class, $movedPiece );
    }
}
