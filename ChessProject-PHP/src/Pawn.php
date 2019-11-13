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

    public function getChesssBoard()
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

    public function getPieceColor(): string
    {
        return $this->pieceColorEnum;
    }

    public function setPieceColor(PieceColorEnum $value)
    {
        $this->pieceColorEnum = $value;
    }

    public function move(MovementTypeEnum $movementTypeEnum, int $newX, int $newY)
    {
        throw new \Exception("Need to implement " . __METHOD__);
    }

    public function toString(): string
    {
		return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->pieceColorEnum})";
    }
}

