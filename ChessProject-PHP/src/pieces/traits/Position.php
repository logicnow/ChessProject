<?php
namespace SolarWinds\Chess\Pieces\Traits;

class Position
{
    private int $xCoordinate;
    private int $yCoordinate;

    public function __construct(int $xCoordinate, int $yCoordinate)
    {
        $this->xCoordinate = $xCoordinate;
        $this->yCoordinate = $yCoordinate;
    }

    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }
}