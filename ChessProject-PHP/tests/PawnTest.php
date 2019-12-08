<?php

namespace SolarWinds\Chess;

use PHPUnit_Framework_TestCase;
use SolarWinds\Chess\Pieces\Traits\Color;
use SolarWinds\Chess\Pieces\Types\Pawn;
use SolarWinds\Chess\Pieces\Traits\Action;

class PawnTest extends PHPUnit_Framework_TestCase
{
    private ChessBoard $chessBoard;
    private Pawn $testSubject;

    protected function setUp()
    {
        $this->chessBoard = new ChessBoard();
        $this->testSubject = new Pawn(Color::WHITE());
    }

    public function testChessBoard_Add_Sets_XCoordinate()
    {
        $this->chessBoard->add($this->testSubject, 6, 3);
        $this->assertEquals(6, $this->testSubject->getXCoordinate());
    }

    public function testChessBoard_Add_Sets_YCoordinate()
    {
        $this->chessBoard->add($this->testSubject, 6, 3);
        $this->assertEquals(3, $this->testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Right_DoesNotMove()
    {
        $this->chessBoard->add($this->testSubject, 6, 3);
        $this->testSubject->move(Action::MOVE(), 7, 3);
        $this->assertEquals(6, $this->testSubject->getXCoordinate());
        $this->assertEquals(3, $this->testSubject->getYCoordinate());
    }

    public function testPawn_Move_IllegalCoordinates_Left_DoesNotMove()
    {
        $this->chessBoard->add($this->testSubject, 6, 3);
        $this->testSubject->move(Action::MOVE(), 4, 3);
        $this->assertEquals(6, $this->testSubject->getXCoordinate());
        $this->assertEquals(3, $this->testSubject->getYCoordinate());
    }

    public function testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
    {
        $this->chessBoard->add($this->testSubject, 6, 3);
        $this->testSubject->move(Action::MOVE(), 6, 4);
        $this->assertEquals(6, $this->testSubject->getXCoordinate());
        $this->assertEquals(4, $this->testSubject->getYCoordinate());
    }
}
