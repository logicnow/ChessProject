<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\MovementTypeEnum;
use SolarWinds\Chess\Pawn;
use SolarWinds\Chess\PieceColorEnum;


class PawnTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  Pawn */
    private $_testSubject;

    protected function setUp()
    {
        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Pawn(PieceColorEnum::BLACK());

        $this->_testSubject->setChessBoard($this->_chessBoard);

    }

    public function testChessBoard_Add_Sets_XCoordinate()
    {
        $this->_testSubject
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $this->_chessBoard->add($this->_testSubject);

        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
    }

    public function testChessBoard_Add_Sets_YCoordinate()
    {
        $this->_testSubject
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $this->_chessBoard->add($this->_testSubject);
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $this->_testSubject
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $this->_chessBoard->add($this->_testSubject);

        $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 4);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $this->_testSubject
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $this->_chessBoard->add($this->_testSubject);

        $this->_testSubject->move(MovementTypeEnum::MOVE(), 6, 2);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function dataPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
    {
        $testCases = [];

        $testCases['black_pawn'] = [
            \SolarWinds\Chess\PieceColorEnum::BLACK(),
            6,3,
            5,3,
            5,3
        ];

        $testCases['white_pawn'] = [
            \SolarWinds\Chess\PieceColorEnum::WHITE(),
            6,3,
            7,3,
            7,3
        ];

        return $testCases;
    }

    /**
     * @dataProvider dataPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates
     */
    public function testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates(
        \SolarWinds\Chess\PieceColorEnum $pieceColor,
        int $xCoord, int $yCoord,
        int $newXCoord, int $newYCoord,
        int $expectedXCoord, int $expectedYCoord
    ) {
        $this->_testSubject
            ->setPieceColorEnum($pieceColor)
            ->setXCoordinate($xCoord)
            ->setYCoordinate($yCoord);

        $this->_chessBoard->add($this->_testSubject);

        $this->_testSubject->move(MovementTypeEnum::MOVE(), $newXCoord, $newYCoord);
        $this->assertEquals($expectedXCoord, $this->_testSubject->getXCoordinate());
        $this->assertEquals($expectedYCoord, $this->_testSubject->getYCoordinate());
    }

    public function dataPawn_Move_IllegalCoordinates_Forward_DoesNotMove()
    {
        $testCases = [];

        $testCases['black_pawn_illegal_direction'] = [
            \SolarWinds\Chess\PieceColorEnum::BLACK(),
            6,3,
            7,3,
            6,3,
        ];

        $testCases['black_pawn_illegal_distance'] = [
            \SolarWinds\Chess\PieceColorEnum::BLACK(),
            6,3,
            4,3,
            6,3,
        ];

        $testCases['white_pawn_illegal_direction'] = [
            \SolarWinds\Chess\PieceColorEnum::WHITE(),
            6,3,
            5,3,
            6,3,
        ];

        $testCases['white_pawn_illegal_distance'] = [
            \SolarWinds\Chess\PieceColorEnum::WHITE(),
            5,3,
            7,3,
            5,3,
        ];

        return $testCases;
    }

    /**
     * @dataProvider dataPawn_Move_IllegalCoordinates_Forward_DoesNotMove
     */
    public function testPawn_Move_IllegalCoordinates_Forward_DoesNotMove(
        \SolarWinds\Chess\PieceColorEnum $pieceColor,
        int $xCoord, int $yCoord,
        int $newXCoord, int $newYCoord,
        int $expectedXCoord, int $expectedYCoord
    ) {
        $this->_testSubject
            ->setPieceColorEnum($pieceColor)
            ->setXCoordinate($xCoord)
            ->setYCoordinate($yCoord);

        $this->_chessBoard->add($this->_testSubject);

        $this->_testSubject->move(MovementTypeEnum::MOVE(), $newXCoord, $newYCoord);
        $this->assertEquals($expectedXCoord, $this->_testSubject->getXCoordinate());
        $this->assertEquals($expectedYCoord, $this->_testSubject->getYCoordinate());
    }
}
