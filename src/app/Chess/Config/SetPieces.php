<?php namespace App\Chess\Config;

use App\Chess\Models\Game;

class SetPieces
{
    /**
     * @var GeneratePieces
     */
    protected GeneratePieces $generate;

    /**
     * SetPiecesHandler constructor.
     */
    public function __construct()
    {
        $this->generate = new GeneratePieces();
    }

    /**
     * @param Game $game
     */
    public function setPieces( Game $game )
    {
        foreach( $this->generate->GetPieces() as $piece )
        {
            foreach( $game->board->GetFiles() as $file )
            {
                foreach( $file->getRanks() as $rank )
                {
                    if( $rank->x == $piece->getStart()->getFile() && $rank->y == $piece->getStart()->getRank() )
                    {
                        $rank->setPiece( $piece );
                    }
                }
            }
        }
    }
}
