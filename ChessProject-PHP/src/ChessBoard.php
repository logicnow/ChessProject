<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\Pieces\PieceInterface;

class ChessBoard
{
    const MAX_BOARD_WIDTH = 8;
    const MAX_BOARD_HEIGHT = 8;
    const MIN_BOARD_WIDTH = 0;
    const MIN_BOARD_HEIGHT = 0;
    const EMPTY_POSITION = null;
    const EXCEPTION_COORDINATE = -1;

    private array $pieces;

    public function __construct()
    {
        $this->pieces = array_fill(
            self::MIN_BOARD_WIDTH,
            self::MAX_BOARD_WIDTH,
            array_fill(
                self::MIN_BOARD_HEIGHT,
                self::MAX_BOARD_HEIGHT,
                self::EMPTY_POSITION
            )
        );
    }

    /**
     * @param PieceInterface $piece
     * @param $xCoordinate
     * @param $yCoordinate
     * @return ChessBoard
     */
    public function add(PieceInterface $piece, $xCoordinate, $yCoordinate)
    {
        if ($this->isLegalBoardPosition($xCoordinate, $yCoordinate)) {
            $piece->setXCoordinate($xCoordinate)
                ->setYCoordinate($yCoordinate)
                ->setChessBoard($this);

            $this->pieces[$xCoordinate][$yCoordinate] = $piece;
        } else {
            $piece->setXCoordinate(self::EXCEPTION_COORDINATE)
                ->setYCoordinate(self::EXCEPTION_COORDINATE);
        }

        return $this;
    }

    /**
     * @param $xCoordinate
     * @param $yCoordinate
     * @return bool
     */
    public function isLegalBoardPosition($xCoordinate, $yCoordinate): bool
    {
        return (
            $this->isPositionInsideBoard($xCoordinate, $yCoordinate) &&
            $this->isFreeBoardPosition($xCoordinate, $yCoordinate)
        );
    }

    /**
     * @param PieceInterface $piece
     * @param $xCoordinate
     * @param $yCoordinate
     */
    public function updatePiecePosition(PieceInterface $piece, $xCoordinate, $yCoordinate): void 
    {
        $piece = $this->getPiece($piece);
        $piece->setXCoordinate($xCoordinate)
            ->setYCoordinate($yCoordinate);
    }

    public function getPiece(PieceInterface $piece): PieceInterface
    {
        return $this->pieces[$piece->getXCoordinate()][$piece->getYCoordinate()];
    }

    /**
     * @param $xCoordinate
     * @param $yCoordinate
     * @return bool
     */
    private function isPositionInsideBoard($xCoordinate, $yCoordinate): bool
    {
        return (
            $xCoordinate >= self::MIN_BOARD_WIDTH &&
            $yCoordinate >= self::MIN_BOARD_HEIGHT &&
            $xCoordinate < self::MAX_BOARD_WIDTH &&
            $yCoordinate < self::MAX_BOARD_HEIGHT
        );
    }

    /**
     * @param $xCoordinate
     * @param $yCoordinate
     * @return bool
     */
    private function isFreeBoardPosition($xCoordinate, $yCoordinate): bool
    {
        return $this->pieces[$xCoordinate][$yCoordinate] === self::EMPTY_POSITION;
    }
}
