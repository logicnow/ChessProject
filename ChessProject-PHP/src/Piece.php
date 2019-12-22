<?php

namespace SolarWinds\Chess;

abstract class Piece
{
    protected $color;

    protected $xCoordinate;

    protected $yCoordinate;

    public function __construct(PieceColor $color)
    {
        $this->color = $color;
    }

    /** @return int */
    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    /** @var int */
    public function setXCoordinate($value): self
    {
        $this->xCoordinate = $value;

        return $this;
    }

    /** @return int */
    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    /** @var int */
    public function setYCoordinate($value): self
    {
        $this->yCoordinate = $value;

        return $this;
    }

    public function getPieceColor(): int
    {
        return $this->color->getColor();
    }

    public function toString()
    {
        return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->color->getColor()})";
    }

    public abstract function move(MovementType $movementType, $newX, $newY): void;
}