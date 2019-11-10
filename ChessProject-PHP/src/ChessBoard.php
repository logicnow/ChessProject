<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;

    private $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $xCoordinate, $yCoordinate, PieceColorEnum $pieceColor)
    {
        $pawn->setChessBoard($this);

        if($this->isLegalBoardPosition($xCoordinate, $yCoordinate)
            && $this->isBoardPositionFree($xCoordinate, $yCoordinate)) {
            $pawn->setXCoordinate($xCoordinate);
            $pawn->setYCoordinate($yCoordinate);
            $pawn->setPieceColor($pieceColor);
        } else {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);
            $pawn->setPieceColor($pieceColor);
        }

        $this->pieces[$xCoordinate][$yCoordinate] = $pawn;
    }

    public function isLegalBoardPosition(int $xCoordinate, int $yCoordinate): bool
    {
        if ($xCoordinate <= self::MAX_BOARD_WIDTH && $yCoordinate <= self::MAX_BOARD_HEIGHT
            && $xCoordinate >= 0 && $yCoordinate >= 0) {
            return true;
        }

        return false;
    }

    private function isBoardPositionFree(int $xCoordinate, int $yCoordinate): bool
    {
        return ($this->pieces[$xCoordinate][$yCoordinate] == null);
    }
}
