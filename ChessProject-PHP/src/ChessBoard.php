<?php

namespace TechnicalAssessment\Chess;

use ErrorException;

class ChessBoard
{
    private const MAX_BOARD_WIDTH = 7;
    private const MAX_BOARD_HEIGHT = 7;

    private array $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    /**
     * @throws ErrorException
     */
    public function add(Pawn $pawn, int $xCoordinate, int $yCoordinate, PieceColorEnum $pieceColor): void
    {
        throw new ErrorException("Need to implement " . __METHOD__);
    }

    /**
     * @throws ErrorException
     */
    public function isLegalBoardPosition(int $xCoordinate, int $yCoordinate): bool
    {
        throw new ErrorException("Need to implement " . __METHOD__);
    }
}
