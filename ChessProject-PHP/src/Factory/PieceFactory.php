<?php

namespace SolarWinds\Chess\Factory;

use SolarWinds\Chess\Pawn;
use SolarWinds\Chess\Piece;
use SolarWinds\Chess\PieceColor;

class PieceFactory
{
    const PAWN = 1;

    public static function create(int $type, PieceColor $color): Piece
    {
        switch ($type){
            case self::PAWN:
                return new Pawn($color);
                break;
            default:
                throw new \Exception('Invalid type');
                break;
        }
    }
}