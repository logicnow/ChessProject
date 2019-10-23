<?php

namespace SolarWinds\Chess;


class Pawn
{
    const MAX_PAWN_MOVEMENT_DISTANCE = 1;

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

    public function setPieceColorEnum(PieceColorEnum $pieceColorEnum): Pawn
    {
        $this->pieceColorEnum = $pieceColorEnum;

        return $this;
    }

    public function getPieceColor(): PieceColorEnum
    {
        return $this->pieceColorEnum;
    }

    public function move(int $newX, int $newY)
    {
        if (!$this->chessBoard->isLegalBoardPosition($newX, $newY) || !$this->isLegalPawnPosition($newX, $newY)) {

            return;
        }

        $this->xCoordinate = $newX;
        $this->yCoordinate = $newY;
    }

    protected function isLegalPawnPosition($newX, $newY): bool
    {
        switch ($this->pieceColorEnum) {
            case PieceColorEnum::BLACK():
                $movingForward = $this->xCoordinate - $newX == self::MAX_PAWN_MOVEMENT_DISTANCE;
                $movingDiagonally = $movingForward && abs($newY - $this->yCoordinate) == self::MAX_PAWN_MOVEMENT_DISTANCE;

                return $movingForward || $movingDiagonally;
            case PieceColorEnum::WHITE():
                $movingForward = $newX - $this->xCoordinate == self::MAX_PAWN_MOVEMENT_DISTANCE;
                $movingDiagonally = $movingForward && abs($newY - $this->yCoordinate) == self::MAX_PAWN_MOVEMENT_DISTANCE;

                return $movingForward || $movingDiagonally;
        }
    }

    public function toString()
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColorEnum})";
    }
}

