<?php

require_once '../vendor/autoload.php';
require_once './_includes/prepend.php';

?>
<html>
<head>
    <title>Chess</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<main>

    <?php if( $gameHandler->getWinner() ) { ?>
    <div class="winner">
        <span>Game won by: <?php echo $gameHandler->getWinner()->getName(); ?></span>
    </div>
    <? } ?>

    <div class="game-holder">
        <div class="board cf">
            <?php foreach( $gameHandler->getFiles() as $file ) { ?>
            <div class="file">
            <?php foreach(  $file->getRanks() as $rank ) { ?>
                <div class="rank <?php echo strtolower( $rank->getColor() ) ?> <? $rank->getPiece() ? 'occupied' : '' ?> ">
                    <span class="coordinate"> <?php echo $rank->x . ' - ' . \App\Chess\Helpers\CoordinateHelper::GetNumber( $rank->y ) ?></span>
                    <?php if( $rank->getPiece() ) { ?>
                    <span class="symbol" title="<?php echo $rank->getPiece()->getColour(); ?> - <?php echo $rank->getPiece()->getKey(); ?>">
                        <?php echo $rank->getPiece()->getSymbol(); ?><br>
                    </span>
                    <?php } ?>
                </div>
            <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="controls-holder">

        <div class="logs">
            <p>Logs</p>
            <ul>
            <?php
            foreach( $gameHandler->getLogs() as $log ) { ?>
            <li><?php
                if( $log->type === \App\Chess\Storage\LogTypes::MOVE )
                {
                    if( $log->getPieceTaken() ){
                        echo '<span class="success">Move (piece taken)</span>';
                    }
                    else {
                        if( $log->getCastling() ) {
                            echo '<span class="success">Move (Castling)</span>';
                        } else {
                            echo '<span class="success">Move</span>';
                        }
                    }
                    echo '<span class="player">Player: ' . $log->getPlayer()->getName() . '</span>';
                    echo '<span class="colour">Color: ' . $log->getPiece()->getColour() . '</span>';
                    echo '<span class="piece">Piece: ' .$log->getPiece()->getKey() . '</span>';
                    echo '<span class="move">From: ' . $log->getFrom()->getFile() . ' ' . \App\Chess\Helpers\CoordinateHelper::GetNumber( $log->getFrom()->getRank() ) . ' | to ' . $log->getTo()->getFile() . ' ' . \App\Chess\Helpers\CoordinateHelper::GetNumber( $log->getTo()->getRank() ) . '</span>';
                    if( $log->getPieceTaken() )
                    {
                        echo '<span>Piece taken: ' . $log->getPieceTaken()->getColour() . ' ' . $log->getPieceTaken()->getKey() . '</span>';
                    }
                }
                if( $log->type === \App\Chess\Storage\LogTypes::PROMOTION )
                {
                    echo '<span class="success">Pawn promoted</span>';
                    echo '<span>Promoted too: ' . $log->getPromotion()->getPiece()->getColour() . ' ' . $log->getPromotion()->getPiece()->getKey() . '</span>';
                }
                if( $log->getType() === \App\Chess\Storage\LogTypes::MOVE_ERROR )
                {
                    echo '<span class="error">Move error</span>';
                    if( $log->getPiece() ) {
                        echo '<span class="colour">Color: ' . $log->getPiece()->getColour() . '</span>';
                        echo '<span class="piece">Piece: ' . $log->getPiece()->getKey() . '</span>';
                    }
                    echo '<span class="move">From: ' . $log->getFrom()->getFile() . ' ' . \App\Chess\Helpers\CoordinateHelper::GetNumber( $log->getFrom()->getRank() ) . ' | to ' . $log->getTo()->getFile() . ' ' . \App\Chess\Helpers\CoordinateHelper::GetNumber( $log->getTo()->getRank() ) . '</span>';
                    echo '<span>' . $log->getError() . '</span>';
                }
                if( $log->getType() === \App\Chess\Storage\LogTypes::PROMOTION_ERROR )
                {
                    echo '<span class="error">Promotion error</span>';
                    echo '<span>' . $log->getError() . '</span>';
                }
                ?></li>
            <?php } ?>
            </ul>
        </div>
    </div>
</main>
</body>
</html>
