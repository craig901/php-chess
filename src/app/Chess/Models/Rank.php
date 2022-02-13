<?php namespace App\Chess\Models;

use App\Chess\Pieces\Piece;

class Rank
{
    /**
     * @var string
     */
    public string $x;

    /**
     * @var int
     */
    public int $y;

    /**
     * @var string
     */
    public string $color;

    /**
     * @var ?Piece
     */
    public ?Piece $piece = null;

    /**
     * Square constructor.
     *
     * @param string $x
     * @param int $y
     * @param string $colour
     */
    public function __construct( string $x, int $y, string $colour )
    {
        $this->x = $x;
        $this->y = $y;
        $this->color = $colour;
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
     * @return Piece
     */
    public function removePiece(): ?Piece
    {
        $pieceToRemove = $this->piece;
        $this->piece = null;
        return $pieceToRemove;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param Coordinate $coordinate
     * @return bool
     */
    public function coordinateMatches( Coordinate $coordinate ): bool
    {
        if( $this->x === $coordinate->getFile() && $this->y === $coordinate->getRank() )
            return true;

        return false;
    }
}
