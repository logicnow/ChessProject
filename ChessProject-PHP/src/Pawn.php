<?php

namespace SolarWinds\Chess;


class Pawn
{
    /** @var PieceColorEnum */
    private $pieceColorEnum;

    /** @var ChessBoard */
    private $chessBoard;

    /** @var int */
    private $xCoordinate;

    /** @var int */
    private $yCoordinate;

    public function __construct(PieceColorEnum $pieceColorEnum)
    {
        $this->pieceColorEnum = $pieceColorEnum;
    }

    public function setChessBoard(ChessBoard $chessBoard): self
    {
        $this->chessBoard = $chessBoard;

        return $this;
    }

    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    public function setXCoordinate(int $value): Pawn
    {
        $this->xCoordinate = $value;

        return $this;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    public function setYCoordinate($value): Pawn
    {
        $this->yCoordinate = $value;

        return $this;
    }

    public function getPieceColor(): PieceColorEnum
    {
        return $this->pieceColorEnum;
    }

    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY)
    {
        switch ($movementTypeEnum) {
            case MovementTypeEnum::MOVE():
                if (!$this->chessBoard->isLegalBoardPosition($newX, $newY) || !$this->isLegalPawnPosition($newX, $newY)) {
                    return;
                }

                $this->xCoordinate = $newX;
                $this->yCoordinate = $newY;
            break;
        }
    }

    protected function isLegalPawnPosition($newX, $newY): bool
    {
        switch ($this->pieceColorEnum) {
            case PieceColorEnum::BLACK():
                $movingForward = $this->xCoordinate - $newX == 1;
                $movingDiagonally = $movingForward && abs($newY - $this->yCoordinate) == 1;

                return $movingForward || $movingDiagonally;

        }
    }

    public function toString()
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColorEnum})";
    }
}

