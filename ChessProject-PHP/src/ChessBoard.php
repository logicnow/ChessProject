<?php

namespace TechnicalAssessment\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 7;
    const MAX_BOARD_HEIGHT = 7;

    private $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn, $xCoordinate, $yCoordinate, PieceColorEnum $pieceColor)
    {
        throw new \ErrorException("Need to implement " . __METHOD__);
    }

    /**
 	 * @return boolean
 	 **/
    public function isLegalBoardPosition($xCoordinate, $yCoordinate)
    {
        throw new \ErrorException("Need to implement " . __METHOD__);
    }
}
