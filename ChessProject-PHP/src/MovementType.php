<?php

namespace SolarWinds\Chess;

class MovementType
{
    const MOVE = 1;
    const CAPTURE = 2;

    private $movement;

    public function __construct(int $movement)
    {
        if (!in_array($movement, [self::MOVE, self::CAPTURE])) {
            throw new \Exception('Invalid movement type!');
        }

        $this->movement = $movement;
    }

    public function getMovement(): int {
        return $this->movement;
    }
}