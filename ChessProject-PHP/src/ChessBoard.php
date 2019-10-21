<?php

namespace SolarWinds\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;

    private $pieces;

    private $piecesCount = [];

    public function __construct()
    {
        $this->piecesCount[PieceColorEnum::WHITE()->innerValue()] = 0;
        $this->piecesCount[PieceColorEnum::BLACK()->innerValue()] = 0;
        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $xCoordinate, $yCoordinate, PieceColorEnum $pieceColor)
    {
        if (!empty($this->pieces[$xCoordinate][$yCoordinate])) {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);

            return;
        }

        $this->piecesCount[$pawn->getPieceColor()->innerValue()]++;

        if ($this->maxNumberOfPiecesExceeded($pawn->getPieceColor())) {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);

            return;
        }

        $pawn->setXCoordinate($xCoordinate);
        $pawn->setYCoordinate($yCoordinate);

        $this->pieces[$xCoordinate][$yCoordinate] = $pawn;
    }

    private function maxNumberOfPiecesExceeded(PieceColorEnum $pieceColor)
    {
        return $this->piecesCount[$pieceColor->innerValue()] >= 2 * self::MAX_BOARD_WIDTH;
    }

    /**
 	 * @return boolean
 	 **/
    public function isLegalBoardPosition($xCoordinate, $yCoordinate)
    {
        return $xCoordinate >= 0 && $yCoordinate >= 0
            && $xCoordinate < self::MAX_BOARD_HEIGHT && $yCoordinate < self::MAX_BOARD_WIDTH;
    }
}
