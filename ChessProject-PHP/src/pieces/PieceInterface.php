<?php

namespace SolarWinds\Chess\Pieces;


use SolarWinds\Chess\ChessBoard;

interface PieceInterface
{
    /**
     * @param ChessBoard $chessBoard
     * @return ChessBoard
     */
    public function setChessBoard(ChessBoard $chessBoard);

    /**
     * @param int $xCoordinate
     * @return $this
     */
    public function setXCoordinate(int $xCoordinate);

    /**
     * @return int
     */
    public function getXCoordinate();

    /**
     * @param int $yCoordinate
     * @return $this
     */
    public function setYCoordinate(int $yCoordinate);

    /**
     * @return int
     */
    public function getYCoordinate();

    /**
     * @return string
     */
    public function getColor();

    /**
     * @param $action
     * @param $xCoordinate
     * @param $yCoordinate
     * @return void
     */
    public function move($action, $xCoordinate, $yCoordinate);
}