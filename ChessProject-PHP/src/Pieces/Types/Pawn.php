<?php

namespace SolarWinds\Chess\Pieces\Types;


use Exception;
use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\Pieces\Piece;
use SolarWinds\Chess\Pieces\Traits\Action;

class Pawn extends Piece
{
    /**
     * @inheritDoc
     * @throws Exception
     */
    public function move($action, $xCoordinate, $yCoordinate): void
    {
        if ($action === Action::CAPTURE()) {
            throw new Exception("CAPTURE action not implemented.");
        }

        if (!$this->chessBoard->isLegalBoardPosition($xCoordinate, $yCoordinate)) {
            $this->getChessBoard()->updatePiecePosition(
                $this,
                ChessBoard::EXCEPTION_COORDINATE,
                ChessBoard::EXCEPTION_COORDINATE
            );
        }

        if ($this->isLegalPawnMove($xCoordinate, $yCoordinate)) {
            $this->getChessBoard()->updatePiecePosition(
                $this,
                $xCoordinate,
                $yCoordinate
            );
        }
    }


    public function isLegalPawnMove($xCoordinate, $yCoordinate): bool
    {
        return (
            abs($yCoordinate - $this->yCoordinate) === 1
            && $xCoordinate === $this->xCoordinate
        );
    }
}