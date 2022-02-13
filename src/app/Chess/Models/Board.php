<?php namespace App\Chess\Models;

use App\Chess\Config\GameConfig;
use App\Chess\Pieces\Piece;
use App\Chess\Storage\Colours;

class Board
{
    /**
     * @var GameConfig
     */
    protected GameConfig $config;

    /**
     * @var File[]
     */
    protected array $files = [];

    /**
     * Board constructor.
     * @param GameConfig $config
     */
    public function __construct( GameConfig $config )
    {
        $this->config = $config;
        $startColor = $this->config->getColor();

        foreach ( \App\Chess\Storage\Board::FILES as $key )
        {
            $this->files[] = new File( $config, $key, $startColor );
            $startColor = $startColor == Colours::BLACK ? Colours::WHITE : Colours::BLACK;
        }
    }

    /**
     * @return File[]
     */
    public function getFiles(): array
    {
        return $this->files;
    }

    /**
     * @param Coordinate $coordinate
     * @return Piece|null
     */
    public function getPieceByCoordinate( Coordinate $coordinate ): ?Piece
    {
        foreach( $this->files as $file )
        {
            if( $file->GetKey() === $coordinate->getFile() )
            {
                foreach( $file->ranks as $rank )
                {
                    if( $rank->coordinateMatches( $coordinate ) )
                    {
                        return $rank->getPiece();
                    }
                }
            }
        }
        return null;
    }

    /**
     * @param Move $move
     * @return Piece|null
     */
    public function takePiece( Move $move ): ?Piece
    {
        $rank = $this->getRankByCoordinate( $move->getTo() );
        return $rank->removePiece();
    }

    /**
     * @param Move $move
     */
    public function move( Move $move )
    {
        $this->emptyRank( $move->getFrom() );
        $this->addPieceToRank( $move->getPiece(), $move->getTo() );
        if( $move->getCastling() )
        {
            $castle = $this->getPieceByCoordinate( $move->getCastling()->getCastleFrom() );
            $this->emptyRank( $move->getCastling()->getCastleFrom() );
            $this->addPieceToRank( $castle, $move->getCastling()->getCastleTo() );
        }
    }

    /**
     * @param Promotion $promotion
     */
    public function promotePawn( Promotion $promotion ): void
    {
        $this->emptyRank( $promotion->getCoordinate() );
        $this->addPieceToRank( $promotion->getPiece(), $promotion->getCoordinate() );
    }

    /**
     * @param Coordinate $coordinate
     */
    private function emptyRank( Coordinate $coordinate ): void
    {
        $rank = $this->getRankByCoordinate( $coordinate );
        $rank->removePiece();
    }

    /**
     * @param Piece $piece
     * @param Coordinate $coordinate
     */
    private function addPieceToRank( Piece $piece, Coordinate $coordinate ): void
    {
        $rank = $this->getRankByCoordinate( $coordinate );
        $rank->setPiece( $piece );
    }

    /**
     * @param Coordinate $coordinate
     * @return Rank
     */
    private function getRankByCoordinate( Coordinate $coordinate ): ?Rank
    {
        foreach( $this->files as $file )
        {
            if( $file->GetKey() === $coordinate->getFile() )
            {
                foreach( $file->ranks as $rank )
                {
                    if( $rank->y === $coordinate->getRank() )
                    {
                        return $rank;
                    }
                }
            }
        }
    }
}
