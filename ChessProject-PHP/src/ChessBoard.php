<?php

namespace SolarWinds\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(
            0,
            self::MAX_BOARD_WIDTH,
            array_fill(0, self::MAX_BOARD_HEIGHT, 0)
        );
    }

    public function add(Pawn $pawn, int $xCoordinate, int $yCoordinate)
    {
        if ($this->isLegalBoardPosition($xCoordinate, $yCoordinate) &&
            $this->pieces[$xCoordinate][$yCoordinate] === 0
        ) {
            $pawn->setXCoordinate($xCoordinate);
            $pawn->setYCoordinate($yCoordinate);

            $this->pieces[$xCoordinate][$yCoordinate] = $pawn;
        } else {
            $pawn->setYCoordinate(-1);
            $pawn->setXCoordinate(-1);
        }
    }

    /**
 	 * @return boolean
 	 **/
    public function isLegalBoardPosition($xCoordinate, $yCoordinate): bool
    {
        if ($xCoordinate < 0 || $xCoordinate > self::MAX_BOARD_HEIGHT) {
            return false;
        }

        if ($yCoordinate < 0 || $yCoordinate > self::MAX_BOARD_WIDTH) {
            return false;
        }

        return true;
    }
}
