<?php

namespace SolarWinds\Chess;

class PieceColor
{
    const WHITE = 1;
    const BLACK = 2;

    private $color;

    public function __construct(int $color)
    {
        if (!in_array($color, [self::WHITE, self::BLACK])) {
            throw new \Exception('Invalid piece color!');
        }

        $this->color = $color;
    }

    public function getColor(): int {
        return $this->color;
    }
}