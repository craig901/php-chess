<?php

use App\Chess\Config\GameConfig;
use App\Chess\Handlers\GameHandler;
use App\Chess\Models\Player;
use App\Chess\Storage\Colours;

require_once 'functions.php';

$white = new Player( 'joe.bloggs' );
$black = new Player( 'john.doe' );

$config = new GameConfig();
$config->setColor( Colours::BLACK );
$config->setWhite( $white );
$config->setBlack( $black );
$gameHandler = new GameHandler( $config );

require_once  'moves.php';
