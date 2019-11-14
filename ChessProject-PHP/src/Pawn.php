<?php
declare(strict_types=1);

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

    public function getChessBoard(): ChessBoard
    {
        return $this->chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard): Pawn
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

    public function setYCoordinate(int $value): Pawn
    {
        $this->yCoordinate = $value;
        return $this;
    }

    public function getPieceColor(): PieceColorEnum
    {
        return $this->pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value): Pawn
    {
        $this->pieceColorEnum = $value;
        return $this;
    }

    public function move(int $newX, int $newY): void
    {
        if (!$this->getChessBoard()->isLegalBoardPosition($newX, $newY)) {
            return;
        }

        if (!$this->isLegalPawnMovePosition($newX, $newY)) {
            return;
        }

        $this->xCoordinate = $newX;
        $this->yCoordinate = $newY;
    }

    public function toString(): string
    {
		return sprintf("x(%s), y(%s), pieceColor(%s)",
            $this->xCoordinate,
            $this->yCoordinate,
            $this->pieceColorEnum
        );
    }

    public function isLegalPawnMovePosition(int $newX, int $newY): bool
    {
        switch ($this->pieceColorEnum) {
            case PieceColorEnum::BLACK():
                return $this->yCoordinate - $newY === 1 && 0 <= $newX && $newX <= ChessBoard::MAX_BOARD_WIDTH;
            case PieceColorEnum::WHITE():
                return $newY - $this->yCoordinate === 1 && 0 <= $newX && $newX <= ChessBoard::MAX_BOARD_WIDTH;
            default:
                return false;
        }
    }
}
