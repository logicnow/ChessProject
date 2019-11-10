<?php
declare(strict_types=1);

namespace SolarWinds\Chess;

use PHPUnit_Framework_TestCase;

class ChessBoardTest extends PHPUnit_Framework_TestCase
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

    public function testIsLegalBoardPosition_False_testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinatesX_equals_11_Y_equals_5()
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
        $firstPawn = new Pawn(PieceColorEnum::BLACK());
        $secondPawn = new Pawn(PieceColorEnum::BLACK());
        $this->_testSubject->add($firstPawn, 6, 3, PieceColorEnum::BLACK());
        $this->_testSubject->add($secondPawn, 6, 3, PieceColorEnum::BLACK());
        $this->assertEquals(6, $firstPawn->getXCoordinate());
        $this->assertEquals(3, $firstPawn->getYCoordinate());
        $this->assertEquals(-1, $secondPawn->getXCoordinate());
        $this->assertEquals(-1, $secondPawn->getYCoordinate());
    }

    public function testLimits_The_Number_Of_Pawns()
    {
        for ($i = 0; $i < Pawn::MAX_BLACK_PAWNS; $i++) {
            $pawn = new Pawn(PieceColorEnum::BLACK());
            $pawn->setChessBoard($this->_testSubject);
            $row = intval($i / ChessBoard::MAX_BOARD_WIDTH);
            $pawn->setXCoordinate($row);
            $yCoord = intval($i % ChessBoard::MAX_BOARD_WIDTH);
            $pawn->setYCoordinate($yCoord);
            $this->_testSubject->add($pawn, (6 + $row), $yCoord, PieceColorEnum::BLACK());

            if ($row < 1) {
                $this->assertEquals(intval(6 + $row), $pawn->getXCoordinate());
                $this->assertEquals($yCoord, $pawn->getYCoordinate());
            } else {
                $this->assertEquals(-1, $pawn->getXCoordinate());
                $this->assertEquals(-1, $pawn->getYCoordinate());
            }
        }
    }
}
