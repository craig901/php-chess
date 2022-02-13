<?php namespace App\Chess\Models;

use App\Chess\Pieces\Piece;
use App\Chess\Storage\LogTypes;
use DateTime;

class Log
{
    /**
     * @var string
     */
    public string $type;

    /**
     * @var Player|null
     */
    public ?Player $player;

    /**
     * @var ?Piece
     */
    public ?Piece $piece = null;

    /**
     * @var ?Piece
     */
    public ?Piece $pieceTaken = null;

    /**
     * @var ?Coordinate
     */
    public ?Coordinate $from = null;

    /**
     * @var ?Coordinate
     */
    public ?Coordinate $to = null;

    /**
     * @var string
     */
    public string $error;

    /**
     * @var DateTime
     */
    public DateTime $createdAt;

    /**
     * @var bool
     */
    protected bool $castling;

    /**
     * @var ?Promotion
     */
    protected ?Promotion $promotion;

    /**
     * Log constructor.
     *
     * @param string $type
     */
    public function __construct( string $type )
    {
        $this->type = $type;
        try {
            $this->createdAt = new DateTime();
        }
        catch( \Exception $e )
        {

        }
        $this->castling = false;
    }

    /**
     * @param Player $player
     */
    public function setPlayer( Player $player )
    {
        $this->player = clone $player;
    }

    /**
     * @return Player|null
     */
    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param Piece $piece
     */
    public function setPiece( Piece $piece )
    {
        $this->piece = $piece;
    }

    /**
     * @return Piece
     */
    public function getPiece(): ?Piece
    {
        return $this->piece;
    }

    /**
     * @param Piece $piece
     */
    public function setPieceTaken( Piece $piece )
    {
        $this->pieceTaken = $piece;
    }

    /**
     * @return ?Piece
     */
    public function getPieceTaken(): ?Piece
    {
        return $this->pieceTaken;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setFrom( Coordinate $coordinate )
    {
        $this->from = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getFrom(): ?Coordinate
    {
        return $this->from;
    }

    /**
     * @param Coordinate $coordinate
     */
    public function setTo( Coordinate $coordinate )
    {
        $this->to = $coordinate;
    }

    /**
     * @return Coordinate
     */
    public function getTo(): ?Coordinate
    {
        return $this->to;
    }

    /**
     * @param $error
     */
    public function setError( $error )
    {
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @param $val
     */
    public function setCastling( $val ): void
    {
        $this->castling = $val;
    }

    /**
     * @return bool
     */
    public function getCastling(): bool
    {
        return $this->castling;
    }

    /**
     * @param Promotion $promotion
     */
    public function setPromotion( Promotion $promotion ): void
    {
        $this->promotion = $promotion;
    }

    /**
     * @return ?Promotion
     */
    public function getPromotion(): ?Promotion
    {
        return $this->promotion;
    }
}
