<?php namespace App\Chess\Storage;

class Board
{
    const FILES = [
        Coordinates::A,
        Coordinates::B,
        Coordinates::C,
        Coordinates::D,
        Coordinates::E,
        Coordinates::F,
        Coordinates::G,
        Coordinates::H
    ];

    const RANKS = [
        Coordinates::ONE,
        Coordinates::TWO,
        Coordinates::THREE,
        Coordinates::FOUR,
        Coordinates::FIVE,
        Coordinates::SIX,
        Coordinates::SEVEN,
        Coordinates::EIGHT,
    ];
}
