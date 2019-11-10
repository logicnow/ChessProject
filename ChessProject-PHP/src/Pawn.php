<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class Pawn
{
    const MAX_BLACK_PAWNS = 8;
    const MAX_WHITE_PAWNS = 8;

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

    public function getChesssBoard(): ChessBoard
    {
        return $this->chessBoard;
    }

    public function setChessBoard(ChessBoard $chessBoard)
    {
        $this->chessBoard = $chessBoard;
    }

    public function getXCoordinate(): int
    {
        return $this->xCoordinate;
    }

    public function setXCoordinate(int $value)
    {
        $this->xCoordinate = $value;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    public function setYCoordinate(int $value)
    {
        $this->yCoordinate = $value;
    }

    public function getPieceColor(): PieceColorEnum
    {
        return $this->pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value)
    {
        $this->pieceColorEnum = $value;
    }

    public function move(MovementTypeEnum $movementTypeEnum, $newX, $newY)
    {
        if (!$this->getChesssBoard()->isLegalBoardPosition($newX, $newY)) {
            return;
        }

        if (!$this->isLegalPawnMovePosition($newX, $newY)) {
            return;
        }

        $this->xCoordinate = $newX;
        $this->yCoordinate = $newY;
    }

    public function toString()
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColorEnum})";
    }

    private function isLegalPawnMovePosition($newX, $newY): bool
    {
        switch ($this->pieceColorEnum) {
            case PieceColorEnum::BLACK():
                return $this->yCoordinate - $newY === 1 && 0 <= $newX && $newX <= ChessBoard::MAX_BOARD_WIDTH;
            case PieceColorEnum::WHITE():
                return $newY - $this->yCoordinate === 1 && 0 <= $newX && $newX <= ChessBoard::MAX_BOARD_WIDTH;
            default:
                throw new \Exception('No suitable pieceColor');
        }
    }
}

