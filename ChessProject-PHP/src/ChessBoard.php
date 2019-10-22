<?php

namespace SolarWinds\Chess;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;

    private $maxNumberOfPieces = [];

    private $pieces;

    private $piecesCount = [];

    public function __construct()
    {
        $this->piecesCount[PieceColorEnum::WHITE()->innerValue()] = 0;
        $this->piecesCount[PieceColorEnum::BLACK()->innerValue()] = 0;

        $this->maxNumberOfPieces[PieceColorEnum::WHITE()->innerValue()] = 8;
        $this->maxNumberOfPieces[PieceColorEnum::BLACK()->innerValue()] = 8;

        $this->pieces = array_fill(0, self::MAX_BOARD_WIDTH, array_fill(0, self::MAX_BOARD_HEIGHT, 0));
    }

    public function add(Pawn $pawn)
    {
        if (!empty($this->pieces[$pawn->getXCoordinate()][$pawn->getYCoordinate()])) {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);

            return;
        }

        $this->piecesCount[$pawn->getPieceColor()->innerValue()]++;

        if ($this->maxNumberOfPiecesExceededForColor($pawn->getPieceColor())) {
            $pawn->setXCoordinate(-1);
            $pawn->setYCoordinate(-1);

            return;
        }

        $this->pieces[$pawn->getXCoordinate()][$pawn->getYCoordinate()] = $pawn;
    }

    private function maxNumberOfPiecesExceededForColor(PieceColorEnum $pieceColor): bool
    {
        return $this->piecesCount[$pieceColor->innerValue()] > $this->maxNumberOfPieces[$pieceColor->innerValue()];
    }

    public function isLegalBoardPosition(int $xCoordinate, int $yCoordinate): bool
    {
        return $xCoordinate >= 0 && $yCoordinate >= 0
            && $xCoordinate < self::MAX_BOARD_HEIGHT && $yCoordinate < self::MAX_BOARD_WIDTH;
    }
}
