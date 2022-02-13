<?php namespace App\Chess\Handlers;

use App\Chess\Models\Move;
use App\Chess\Models\Score;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;

class ScoreHandler
{
    /**
     * @var Piece[]
     */
    private array $whitePiecesTaken = [];

    /**
     * @var Piece[]
     */
    private array $blackPiecesTaken = [];

    /**
     * @param Move $move
     */
    public function takePiece( Move $move )
    {
        switch( $move->getPieceToTake()->getColour() )
        {
            case Colours::WHITE:
                $this->whitePiecesTaken[] = $move->getPieceToTake();
                break;

            case Colours::BLACK:
                $this->blackPiecesTaken[] = $move->getPieceToTake();
                break;
        }
    }

    /**
     * @param $colour
     * @param $promoteToo
     * @return Piece|null
     */
    public function getPiece( $colour, $promoteToo ): ?Piece
    {
        switch( $colour )
        {
            case Colours::WHITE:
                foreach( $this->whitePiecesTaken as $key => $piece )
                {
                    if( $piece->getKey() === $promoteToo )
                    {
                        unset( $this->whitePiecesTaken[ $key ] );
                        return $piece;
                    }
                }
                break;

            case Colours::BLACK:
                foreach( $this->blackPiecesTaken as $key => $piece )
                {
                    if( $piece->getKey() === $promoteToo )
                    {
                        unset( $this->blackPiecesTaken[ $key ] );
                        return $piece;
                    }
                }
                break;

            default:
                return null;
        }

        return null;
    }

    /**
     * @return Score
     */
    public function getScores(): Score
    {
        $scores = new Score();
        $scores->setWhite( $this->whitePiecesTaken );
        $scores->setBlack( $this->blackPiecesTaken );
        return $scores;
    }
}
