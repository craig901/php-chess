<?php namespace tests\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Models\Coordinate;
use App\Chess\Models\File;
use App\Chess\Models\Game;
use App\Chess\Models\Move;
use App\Chess\Models\Player;
use App\Chess\Models\Promotion;
use App\Chess\Pieces\Castle;
use App\Chess\Pieces\Pawn;
use App\Chess\Pieces\Queen;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Coordinates;
use App\Chess\Storage\Pieces;
use tests\Chess\ChessTestCase;

class GameTest extends ChessTestCase
{
    /**
     * @var Game
     */
    private Game $model;

    /**
     * Set the test up
     */
    public function setUp(): void
    {
        $this->model = $this->getFreshGame();
    }

    /**
     * Test the get files method
     */
    public function test_getFiles_returnsFiles(): void
    {
        $files = $this->model->getFiles();
        $this->assertInstanceOf( File::class, $files[ 0 ] );
    }

    /**
     * Test the get piece by coordinate method returns a piece
     */
    public function test_getPieceByCoordinate_returnsPiece(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = $this->model->getPieceByCoordinate( $coordinate );
        $this->assertInstanceOf( Castle::class, $piece );
    }

    /**
     * Test the get piece by coordinate methods returns null
     */
    public function test_getPieceByCoordinate_returnsNull(): void
    {
        $white = new Player('shaquille.oatmeal');
        $black = new Player('fast_and_the_curious');

        $config = new GameConfig();
        $config->setColor(Colours::BLACK);
        $config->setWhite($white);
        $config->setBlack($black);

        $model = new Game( $config );
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = $model->getPieceByCoordinate( $coordinate );
        $this->assertNull( $piece );
    }

    /**
     * Test correct colour to go method returns true
     */
    public function test_correctColourToGo_returnsTrue(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = new Pawn( Colours::WHITE, $coordinate );
        $result = $this->model->correctColourToGo( $piece );
        $this->assertTrue( $result );
    }

    /**
     * Test correct colour to go method returns false
     */
    public function test_correctColourToGo_returnsFalse(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = new Pawn( Colours::BLACK, $coordinate );
        $result = $this->model->correctColourToGo( $piece );
        $this->assertFalse( $result );
    }

    /**
     * Test move occupied by the same colour returns true
     */
    public function test_moveOccupiedByTheSameColour_returnsTrue(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = new Pawn( Colours::WHITE, $coordinate );
        $result = $this->model->moveOccupiedByTheSameColour( $piece, $coordinate );
        $this->assertTrue( $result );
    }

    /**
     * Test move occupied by the same colour returns true
     */
    public function test_moveOccupiedByTheSameColour_returnsFalse(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::ONE );
        $piece = new Pawn( Colours::BLACK, $coordinate );
        $result = $this->model->moveOccupiedByTheSameColour( $piece, $coordinate );
        $this->assertFalse( $result );
    }

    /**
     * Test take piece removes piece from rank
     */
    public function test_takePiece_takesPiece(): void
    {
        $from = new Coordinate( Coordinates::A, Coordinates::TWO );
        $to = new Coordinate( Coordinates::A, Coordinates::EIGHT );
        $piece = new Pawn( Colours::BLACK, $from );
        $pieceToTake = new Castle( Colours::WHITE, $to );
        $move = new Move( $this->model, $piece, $from, $to );
        $move->setPieceToTake( $pieceToTake );
        $this->model->takePiece( $move );
        $result = $this->model->getPieceByCoordinate( $to );
        $this->assertNull( $result );
    }

    /**
     * Test the move method empties the from coordinate
     */
    public function test_move_emptiesFrom(): void
    {
        $from = new Coordinate( Coordinates::A, Coordinates::TWO );
        $to = new Coordinate( Coordinates::A, Coordinates::FOUR );
        $piece = new Pawn( Colours::BLACK, $from );
        $move = new Move( $this->model, $piece, $from, $to );
        $this->model->move( $move );

        $result = $this->model->getPieceByCoordinate( $from );
        $this->assertNull( $result );
    }

    /**
     * Test the move method populates the to coordinate
     */
    public function test_move_populatesTo(): void
    {
        $from = new Coordinate( Coordinates::A, Coordinates::TWO );
        $to = new Coordinate( Coordinates::A, Coordinates::FOUR );
        $piece = new Pawn( Colours::BLACK, $from );
        $move = new Move( $this->model, $piece, $from, $to );
        $this->model->move( $move );

        $result = $this->model->getPieceByCoordinate( $to );
        $this->assertNotNull( $result );
    }

    /**
     * Test the promote pawn method promotes
     */
    public function test_promotePawn_promotesPawn(): void
    {
        $coordinate = new Coordinate( Coordinates::A, Coordinates::EIGHT );
        $queenCoordinate = new Coordinate( Coordinates::D, Coordinates::ONE );
        $queen = new Queen( Colours::WHITE, $queenCoordinate );
        $promotion = new Promotion( $coordinate, $queen );
        $this->model->promotePawn( $promotion );

        $result = $this->model->getPieceByCoordinate( $coordinate );
        $this->assertInstanceOf( Queen::class, $result );
    }

    /**
     * Test the move method
     */
    public function test_move(): void
    {
        $from = new Coordinate( Coordinates::A, Coordinates::TWO );
        $to = new Coordinate( Coordinates::A, Coordinates::FOUR );
        $piece = new Pawn( Colours::BLACK, $from );
        $move = new Move( $this->model, $piece, $from, $to );
        $this->model->move( $move );

        $result = $this->model->getPieceByCoordinate( $to );
        $this->assertInstanceOf( Pawn::class, $result );
    }

    /**
     * Test the get piece taken method
     */
    public function test_getPieceTaken(): void
    {
        $from = new Coordinate( Coordinates::A, Coordinates::TWO );
        $to = new Coordinate( Coordinates::A, Coordinates::EIGHT );
        $piece = new Pawn( Colours::BLACK, $from );
        $pieceToTake = new Castle( Colours::WHITE, $to );
        $move = new Move( $this->model, $piece, $from, $to );
        $move->setPieceToTake( $pieceToTake );
        $this->model->takePiece( $move );
        $result = $this->model->getPieceTaken( Colours::WHITE, Pieces::CASTLE );
        $this->assertInstanceOf( Castle::class, $result );
    }
}
