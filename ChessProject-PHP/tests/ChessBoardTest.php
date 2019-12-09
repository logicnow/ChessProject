<?php

use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\Pieces\Traits\Color;
use SolarWinds\Chess\Pieces\Types\Pawn;

class ChessBoardTest extends PHPUnit_Framework_TestCase
{
    private ChessBoard $testSubject;

    public function setUp()
    {
        $this->testSubject = new ChessBoard();
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
        $isValidPosition = $this->testSubject->isLegalBoardPosition(0, 0);
        $this->assertTrue($isValidPosition);
    }

    public function testIsLegalBoardPosition_True_X_equals_5_Y_equals_5()
    {
        $isValidPosition = $this->testSubject->isLegalBoardPosition(5, 5);
        $this->assertTrue($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_11_Y_equals_5()
    {
        $isValidPosition = $this->testSubject->isLegalBoardPosition(11, 5);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_0_Y_equals_9()
    {
        $isValidPosition = $this->testSubject->isLegalBoardPosition(0, 9);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_X_equals_11_Y_equals_0()
    {
        $isValidPosition = $this->testSubject->isLegalBoardPosition(11, 0);
        $this->assertFalse($isValidPosition);
    }

    public function testIsLegalBoardPosition_False_For_Negative_Y_Values()
    {
        $isValidPosition = $this->testSubject->isLegalBoardPosition(5, -1);
        $this->assertFalse($isValidPosition);
    }

    public function testAvoids_Duplicate_Positioning()
    {
        $firstPawn = new Pawn(Color::BLACK());
        $secondPawn = new Pawn(Color::BLACK());
        $this->testSubject->add($firstPawn, 6, 3);
        $this->testSubject->add($secondPawn, 6, 3);
        $this->assertEquals(6, $firstPawn->getXCoordinate());
        $this->assertEquals(3, $firstPawn->getYCoordinate());
        $this->assertEquals(-1, $secondPawn->getXCoordinate());
        $this->assertEquals(-1, $secondPawn->getYCoordinate());
    }

    public function testLimits_The_Number_Of_Pawns()
    {
        for ($row = 0; $row < ChessBoard::MAX_BOARD_WIDTH + 1; $row++) {
            $pawn = new Pawn(Color::BLACK());
            $this->testSubject->add($pawn, $row, ChessBoard::MAX_BOARD_HEIGHT - 1);
            if ($row < ChessBoard::MAX_BOARD_WIDTH) {
                $this->assertEquals($row, $pawn->getXCoordinate());
                $this->assertEquals(ChessBoard::MAX_BOARD_HEIGHT - 1, $pawn->getYCoordinate());
            } else {
                $this->assertEquals(-1, $pawn->getXCoordinate());
                $this->assertEquals(-1, $pawn->getYCoordinate());
            }
        }
    }
}
