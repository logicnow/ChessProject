<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\PieceColor;

class Pawn
{
    /** @var int */
    private $pieceColor;

    /** @var int */
    private $xCoordinate;

    /** @var int */
    private $yCoordinate;

    public function __construct(PieceColor $color)
    {
        $this->pieceColor = $color;
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
        return $this->pieceColor->getColor();
    }

    public function move(MovementType $movementType, $newX, $newY)
    {
        if (($this->getPieceColor() === PieceColor::BLACK && $this->xCoordinate - $newX !== 1) ||
            ($this->getPieceColor() === PieceColor::WHITE && $this->xCoordinate - $newX !== -1)
        ) {
            return;
        } elseif ($this->getPieceColor() === PieceColor::WHITE && $this->xCoordinate - $newX !== -1) {
            return;
        }

        if ($movementType === MovementType::MOVE && $this->yCoordinate !== $newY) {
            return;
        }

        if ($movementType === MovementType::CAPTURE &&
           ($newY !== $this->yCoordinate && $newY !== $this->yCoordinate - 1 && $newY !== $this->yCoordinate + 1))
        {
            return;
        }

        $this->xCoordinate = $newX;
        $this->yCoordinate = $newY;
    }

    public function toString()
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColor->getColor()})";
    }
}

