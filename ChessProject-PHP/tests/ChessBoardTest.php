<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\Pawn;
use SolarWinds\Chess\PieceColorEnum;

class ChessBoardTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ChessBoard */
    private $_testSubject;

    public function setUp()
    {
        $this->_testSubject = new ChessBoard();
    }

    public function testHas_MaxBoardWidth_of_8()
    {
        $this->assertEquals(8, ChessBoard::MAX_BOARD_WIDTH);
    }

    public function testHas_MaxBoardHeight_of_8()
    {
        $this->assertEquals(8, ChessBoard::MAX_BOARD_HEIGHT);
    }

    public function testIsLegalBoardPosition_True_X_equals_0_Y_equals_0()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(0, 0);
        $this->assertTrue($isValidPosition);
    }

    public function testIsLegalBoardPosition_True_X_equals_5_Y_equals_5()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(5, 5);
        $this->assertTrue($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_11_Y_equals_5()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(11, 5);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_0_Y_equals_9()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(0, 9);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_11_Y_equals_0()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(11, 0);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_For_Negative_Y_Values()
    {
        $isValidPosition = $this->_testSubject->isLegalBoardPosition(5, -1);
        $this->assertFalse($isValidPosition);
    }

    public function testAvoids_Duplicate_Positioning()
    {
        $firstPawn = (new Pawn(PieceColorEnum::BLACK()))
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $secondPawn = (new Pawn(PieceColorEnum::BLACK()))
            ->setXCoordinate(6)
            ->setYCoordinate(3);

        $this->_testSubject->add($firstPawn);
        $this->_testSubject->add($secondPawn);

        $this->assertEquals(6, $firstPawn->getXCoordinate());
        $this->assertEquals(3, $firstPawn->getYCoordinate());
        $this->assertEquals(-1, $secondPawn->getXCoordinate());
        $this->assertEquals(-1, $secondPawn->getYCoordinate());
    }

    public function testLimits_The_Number_Of_Pawns()
    {
        for ($i = 0; $i < 10; $i++) {
            $pawn = new Pawn(PieceColorEnum::BLACK());

            $row = intval($i / ChessBoard::MAX_BOARD_WIDTH);
            $pawn->setXCoordinate(6 + $row);

            $yCoordinate = intval($i % ChessBoard::MAX_BOARD_WIDTH);
            $pawn->setYCoordinate($yCoordinate);

            $this->_testSubject->add($pawn);

            if ($row < 1) {
                $this->assertEquals(6 + $row, $pawn->getXCoordinate());
                $this->assertEquals($yCoordinate, $pawn->getYCoordinate());
            } else {
                $this->assertEquals(-1, $pawn->getXCoordinate());
                $this->assertEquals(-1, $pawn->getYCoordinate());
            }
        }
    }

}
