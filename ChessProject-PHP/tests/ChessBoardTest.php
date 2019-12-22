<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\PieceColor;
use SolarWinds\Chess\Factory\PieceFactory;
use SolarWinds\Chess\Pawn;

class ChessBoardTest extends \PHPUnit_Framework_TestCase
{

    /** @var  ChessBoard */
    private $_testSubject;

    public function setUp()
    {
        $this->_testSubject = new ChessBoard();
    }

    public function testHas_MaxBoardWidth_of_7()
    {
        $this->assertEquals(7, ChessBoard::MAX_BOARD_WIDTH);
    }

    public function testHas_MaxBoardHeight_of_7()
    {
        $this->assertEquals(7, ChessBoard::MAX_BOARD_HEIGHT);
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
        $pieceColorBlack = new PieceColor(PieceColor::BLACK);
        $pieceColorWhite = new PieceColor(PieceColor::WHITE);

        $firstPawn = PieceFactory::create(PieceFactory::PAWN, $pieceColorWhite);
        $secondPawn = PieceFactory::create(PieceFactory::PAWN,$pieceColorBlack);
        $this->_testSubject->add($firstPawn, 6, 3);
        $this->_testSubject->add($secondPawn, 6, 3);
        $this->assertEquals(6, $firstPawn->getXCoordinate());
        $this->assertEquals(3, $firstPawn->getYCoordinate());
        $this->assertEquals(-1, $secondPawn->getXCoordinate());
        $this->assertEquals(-1, $secondPawn->getYCoordinate());
    }

    public function testLimits_The_Number_Of_Pawns()
    {
        $pieceColorBlack = new PieceColor(PieceColor::BLACK);

        for ($i = 0; $i < 10; $i++) {
            $pawn = PieceFactory::create(PieceFactory::PAWN, $pieceColorBlack);
            $row = $i / ChessBoard::MAX_BOARD_WIDTH;
            $this->_testSubject->add($pawn, 6, $i % ChessBoard::MAX_BOARD_WIDTH);
            if ($row < 1) {
                $this->assertEquals(6, $pawn->getXCoordinate());
                $this->assertEquals($i % ChessBoard::MAX_BOARD_WIDTH, $pawn->getYCoordinate());
            } else {
                $this->assertEquals(-1, $pawn->getXCoordinate());
                $this->assertEquals(-1, $pawn->getYCoordinate());
            }
        }
    }

}
