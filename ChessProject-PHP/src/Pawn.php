<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\PieceColor;
use SolarWinds\Chess\Piece;

class Pawn extends Piece
{
    public function move(MovementType $movementType, $newX, $newY): void
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
}

