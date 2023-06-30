<?php

namespace TechnicalAssessment\Chess;


use Exception;

class Pawn
{
    private PieceColorEnum $pieceColorEnum;

    private ChessBoard $chessBoard;

    private int $xCoordinate;

    private int $yCoordinate;

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

    public function setXCoordinate(int $value): void
    {
        $this->xCoordinate = $value;
    }

    public function getYCoordinate(): int
    {
        return $this->yCoordinate;
    }

    public function setYCoordinate(int $value): void
    {
        $this->yCoordinate = $value;
    }

    public function getPieceColor(): PieceColorEnum
    {
        return $this->pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value): void
    {
        $this->pieceColorEnum = $value;
    }

    /**
     * @throws Exception
     */
    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY): void
    {
        throw new Exception("Need to implement " . __METHOD__);
    }

    public function __toString()
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColorEnum})";
    }
}
