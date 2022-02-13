<?php

use App\Chess\Handlers\GameHandler;
use App\Chess\Helpers\CoordinateHelper;
use App\Chess\Storage\Coordinates;

/**
 * @var $gameHandler GameHandler
 */

// Testing start
$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::SIX );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SIX );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SIX );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::EIGHT );
$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SIX );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::ONE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::EIGHT );
$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FOUR );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::EIGHT );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::EIGHT );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FOUR );
$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::FIVE );
$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SIX );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::SIX );
$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SIX );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FIVE );
$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
$gameHandler->move( $from, $to );

$coordinate = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
$gameHandler->promote( $coordinate, \App\Chess\Storage\Pieces::QUEEN );

$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::THREE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::FOUR );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::THREE );
$to = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::TWO );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::FOUR );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::ONE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::EIGHT );
$gameHandler->move( $from, $to );

$coordinate = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::ONE );
$gameHandler->promote( $coordinate, \App\Chess\Storage\Pieces::QUEEN );

$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::ONE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::TWO );
$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::FOUR );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::ONE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::FOUR );
$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::FIVE );
$gameHandler->move( $from, $to );

$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::ONE );
$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::ONE );
$gameHandler->move( $from, $to );

// Testing end

//// White
//$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//// Black
//$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//// White
//$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//// White
//$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//// Black
//$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::THREE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//// White
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::ONE );
//$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::ONE );
//$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::ONE );
//$to = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FIVE );
//$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FIVE );
//$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::SIX );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::ONE );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::TWO );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::H, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::EIGHT );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::THREE );
//$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::SEVEN );
//$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::SIX );
//$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::FOUR );
//$to = CoordinateHelper::getCoordinate( Coordinates::B, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::F, Coordinates::SIX );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::ONE );
//$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::SEVEN );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::FIVE );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::THREE );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::EIGHT );
//$to = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::SEVEN );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::G, Coordinates::FOUR );
//$to = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::E, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::A, Coordinates::FIVE );
//$to = CoordinateHelper::getCoordinate( Coordinates::D, Coordinates::TWO );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
//
//$from = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::TWO );
//$to = CoordinateHelper::getCoordinate( Coordinates::C, Coordinates::FOUR );
//if( $gameHandler->canMove( $from, $to ) )
//{
//    $gameHandler->move( $from, $to );
//}
