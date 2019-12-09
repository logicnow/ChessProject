<?php

namespace SolarWinds\Chess\Pieces;


use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\Pieces\Traits\Color;

abstract class Piece implements PieceInterface
{
    protected ChessBoard $chessBoard;
    protected Color $color;
    protected int $xCoordinate;
    protected int $yCoordinate;
    
    public function __construct(Color $color)
    {
        $this->color = $color;
    }

    /**
     * @return ChessBoard
     */
    public function getChessBoard(): ChessBoard
    {
        return $this->chessBoard;
    }

    /**
     * @param ChessBoard $chessBoard
     * @return Piece
     */
    public function setChessBoard(ChessBoard $chessBoard): Piece
    {
        $this->chessBoard = $chessBoard;
        return $this;
    }

    /**
     * @return Color
     */
    public function getColor(): Color
    {
        return $this->color;
    }

    /**
     * @param Color $color
     * @return Piece
     */
    public function setColor(Color $color): Piece
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return int
     */
    public function getXCoordinate()
    {
        return $this->xCoordinate;
    }

    /**
     * @param int $xCoordinate
     * @return Piece
     */
    public function setXCoordinate(int $xCoordinate): Piece
    {
        $this->xCoordinate = $xCoordinate;
        return $this;
    }

    /**
     * @return int
     */
    public function getYCoordinate()
    {
        return $this->yCoordinate;
    }

    /**
     * @param mixed $yCoordinate
     * @return Piece
     */
    public function setYCoordinate(int $yCoordinate): Piece
    {
        $this->yCoordinate = $yCoordinate;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "x({$this->xCoordinate}), y({$this->yCoordinate}), pieceColor({$this->color})";
    }
}