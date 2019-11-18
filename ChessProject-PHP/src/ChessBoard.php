<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;

    const MAX_PAWNS = 8;

    /** @var array */
    private $pieces;

    private $pawnsCount;

    public function __construct()
    {
        $this->pieces     = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
        $this->pawnsCount = [
            PieceColorEnum::WHITE()->getId() => 0,
            PieceColorEnum::BLACK()->getId() => 0
        ];
    }

    public function add(Pawn $pawn, int $xCoordinate, int $yCoordinate, PieceColorEnum $pieceColor): void
    {
        $pawn->setChessBoard($this);
        if ($this->isLegalBoardPosition($xCoordinate, $yCoordinate)
            && $this->isBoardPositionFree($xCoordinate, $yCoordinate)
            && $this->isTotalPawnsReached($pieceColor->getId())
        ) {
            $pawn->setXCoordinate($xCoordinate);
            $pawn->setYCoordinate($yCoordinate);
            $pawn->setPieceColor($pieceColor);

            $this->pawnsCount[$pieceColor->getId()]++;
        } else {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);
            $pawn->setPieceColor($pieceColor);
        }

        $this->pieces[$xCoordinate][$yCoordinate] = $pawn;
    }

    public function isLegalBoardPosition(int $xCoordinate, int $yCoordinate): bool
    {
        $isLegalBoardPosition = false;
        if ($xCoordinate < self::MAX_BOARD_WIDTH
            && $yCoordinate < self::MAX_BOARD_HEIGHT
            && $xCoordinate >= 0
            && $yCoordinate >= 0) {
            $isLegalBoardPosition = true;
        }

        return $isLegalBoardPosition;
    }

    public function isTotalPawnsReached(int $pieceColor): bool
    {
        return ($this->pawnsCount[$pieceColor] < self::MAX_PAWNS);
    }

    private function isBoardPositionFree(int $xCoordinate, int $yCoordinate): bool
    {
        return ($this->pieces[$xCoordinate][$yCoordinate] == null);
    }
}
