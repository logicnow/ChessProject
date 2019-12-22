<?php

namespace SolarWinds\Chess;

use SolarWinds\Chess\ChessBoard;
use SolarWinds\Chess\Pawn;
use SolarWinds\Chess\PieceColor;
use SolarWinds\Chess\MovementType;
use SolarWinds\Chess\Factory\PieceFactory;

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
        $this->_testSubject = PieceFactory::create(PieceFactory::PAWN, $pieceColorBlack);

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

    public function testPawn_Moves_Outside_Board()
    {
        $movementType = new MovementType(MovementType::CAPTURE);

        $this->_chessBoard->add($this->_testSubject, 0,7);
        $this->_testSubject->move($movementType, 1, 8);
        $this->assertEquals(-1, $this->_testSubject->getXCoordinate());
        $this->assertEquals(-1, $this->_testSubject->getYCoordinate());
    }

    public function testBlack_Pawn_Moves_Backwards()
    {
        $movementType = new MovementType(MovementType::MOVE);
        $this->_chessBoard->add($this->_testSubject, 5,5);
        $this->_testSubject->move($movementType, 6, 5);
        $this->assertEquals(5, $this->_testSubject->getXCoordinate());
        $this->assertEquals(5, $this->_testSubject->getYCoordinate());
    }
}
