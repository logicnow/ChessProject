<?php
declare(strict_types=1);

namespace SolarWinds\Chess;


class PawnTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ChessBoard */
    private $_chessBoard;
    /** @var  Pawn */
    private $_testSubject;

    protected function setUp()
    {
        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Pawn(PieceColorEnum::WHITE());
    }

    public function testChessBoard_Add_Sets_XCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3, PieceColorEnum::BLACK());
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
    }

    public function testChessBoard_Add_Sets_YCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3, PieceColorEnum::BLACK());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3, PieceColorEnum::BLACK());
        $this->_testSubject->move(7, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3, PieceColorEnum::BLACK());
        $this->_testSubject->move(4, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3, PieceColorEnum::BLACK());
        $this->_testSubject->move(6, 2);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(2, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_is_LegalPawn_Move_Position_for_BLACK()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 6, PieceColorEnum::BLACK());
        $actual = $this->_testSubject->isLegalPawnMovePosition(6, 5);
        $this->assertTrue($actual);
    }

    public function testPawn_is_LegalPawn_Move_Position_for_WHITE()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 5, PieceColorEnum::WHITE());
        $actual = $this->_testSubject->isLegalPawnMovePosition(6, 6);
        $this->assertTrue($actual);
    }

    public function testPawn_is_LegalPawn_Move_Position_for_WHITE_FALSE()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 1, PieceColorEnum::WHITE());
        $actual = $this->_testSubject->isLegalPawnMovePosition(6, 6);
        $this->assertFalse($actual);
    }

    public function testPawn_is_LegalPawn_Move_Position_for_BLACK_FALSE()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 1, PieceColorEnum::BLACK());
        $actual = $this->_testSubject->isLegalPawnMovePosition(6, 6);
        $this->assertFalse($actual);
    }
}
