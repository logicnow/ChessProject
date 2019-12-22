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
        $pieceColorBlack = new PieceColor(PieceColor::BLACK);

        $this->_chessBoard = new ChessBoard();
        $this->_testSubject = new Pawn($pieceColorBlack);

    }

    public function testChessBoard_Add_Sets_XCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
    }

    public function testChessBoard_Add_Sets_YCoordinate()
    {
        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $movementType = new MovementType(MovementType::MOVE);

        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move($movementType, 7, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $movementType = new MovementType(MovementType::MOVE);

        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move($movementType, 4, 3);
        $this->assertEquals(6, $this->_testSubject->getXCoordinate());
        $this->assertEquals(3, $this->_testSubject->getYCoordinate());
    }

    public function testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
    {
        $movementType = new MovementType(MovementType::MOVE);

        $this->_chessBoard->add($this->_testSubject, 6, 3);
        $this->_testSubject->move($movementType, 5, 2);
        $this->assertEquals(5, $this->_testSubject->getXCoordinate());
        $this->assertEquals(2, $this->_testSubject->getYCoordinate());
    }
}
