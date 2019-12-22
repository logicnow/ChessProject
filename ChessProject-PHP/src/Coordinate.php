<?php

namespace SolarWinds\Chess;

class Coordinate
{
    const ROW = 1;
    const COLUMN = 2;

    private $type;

    private $value;

    public function __construct(int $value, int $type)
    {
        if ($type === self::ROW && ($value < 0 || $value > ChessBoard::MAX_BOARD_HEIGHT)) {
            throw new \Exception('Invalid value for chess board height!');
        }

        if ($type === self::COLUMN && ($value < 0 || $value > ChessBoard::MAX_BOARD_WIDTH)) {
            throw new \Exception('Invalid value for chess board width!');
        }

        $this->type = $type;
        $this->value = $value;
    }
}