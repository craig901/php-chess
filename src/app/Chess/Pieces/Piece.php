<?php namespace App\Chess\Pieces;

use App\Chess\Models\Coordinate;
use App\Chess\Models\Move;
use App\Chess\Storage\Colours;
use App\Chess\Storage\Pieces;

abstract class Piece
{
    /**
     * @var ?string
     */
    protected ?string $whiteSymbol;

    /**
     * @var ?string
     */
    protected ?string $blackSymbol;

    /**
     * @var string
     */
    protected string $colour;

    /**
     * @var Coordinate
     */
    protected Coordinate $start;

    /**
     * @var ?string
     */
    protected ?string $key;

    /**
     * @var array
     */
    protected array $moves = [];

    /**
     * @var array
     */
    protected array $piecesTaken = [];

    /**
     * Piece constructor.
     *
     * @param $colour
     * @param Coordinate $start
     */
    public function __construct( $colour, Coordinate $start )
    {
        $this->colour = $colour;
        $this->start = $start;
    }

    /**
     * @return Coordinate
     */
    public function getStart(): Coordinate
    {
        return $this->start;
    }

    /**
     * @return mixed
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * @return string
     */
    public function getColour(): string
    {
        return $this->colour;
    }

    /**
     * @return string|null
     */
    public function getSymbol(): ?string
    {
        switch( $this->colour )
        {
            case Colours::WHITE:
                return $this->whiteSymbol;
            case Colours::BLACK:
                return $this->blackSymbol;
        }
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->start->getFile();
    }

    /**
     * @return string
     */
    public function getRank(): string
    {
        return $this->start->getRank();
    }

    /**
     * @param Move $move
     */
    public function addMove( Move $move )
    {
        $this->moves[] = $move;
    }

    /**
     * @return array
     */
    public function getMoves(): array
    {
        return $this->moves;
    }

    /**
     * @return bool
     */
    public function firstMove(): bool
    {
        if( empty( $this->moves ) )
        {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isBishop(): ?bool
    {
        if( $this->key === Pieces::BISHOP )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isCastle(): ?bool
    {
        if( $this->key === Pieces::CASTLE )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isKing(): ?bool
    {
        if( $this->key === Pieces::KING )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isKnight(): ?bool
    {
        if( $this->key === Pieces::KNIGHT )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isPawn(): ?bool
    {
        if( $this->key === Pieces::PAWN )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isQueen(): ?bool
    {
        if( $this->key === Pieces::QUEEN )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isWhite(): bool
    {
        if( $this->colour === Colours::WHITE )
            return true;
        return false;
    }

    /**
     * @return bool
     */
    public function isBlack(): bool
    {
        if( $this->colour === Colours::BLACK )
            return true;
        return false;
    }
}
