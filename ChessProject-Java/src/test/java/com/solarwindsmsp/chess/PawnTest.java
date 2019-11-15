package com.solarwindsmsp.chess;

import junit.framework.Assert;
import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class PawnTest {

    private ChessBoard chessBoard;
    private Pawn testSubject;

    @Before
    public void setUp() {
        this.chessBoard = new ChessBoard();
        this.testSubject = new Pawn(PieceColor.BLACK);
    }

    @Test
    public void testChessBoard_Add_Sets_XCoordinate() {

        this.chessBoard.Add(testSubject, new Coordinates(2, 6));
        assertEquals(2, testSubject.getXCoordinate());
    }

    @Test
    public void testChessBoard_Add_Sets_YCoordinate() {
        this.chessBoard.Add(testSubject, new Coordinates(7, 6));
        assertEquals(6, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_IllegalCoordinates_Right_DoesNotMove() {
        chessBoard.Add(testSubject, new Coordinates(0, 6));
        testSubject.Move(MovementType.MOVE, new Coordinates(7, 6));
        assertEquals(0, testSubject.getXCoordinate());
        assertEquals(6, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_IllegalCoordinates_Left_DoesNotMove() {
        chessBoard.Add(testSubject, new Coordinates(5, 6));
        testSubject.Move(MovementType.MOVE, new Coordinates(4, 6));
        assertEquals(5, testSubject.getXCoordinate());
        assertEquals(6, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates() {
        chessBoard.Add(testSubject,new Coordinates(6, 6));
        testSubject.Move(MovementType.MOVE, new Coordinates(6, 5));
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(5, testSubject.getYCoordinate());
    }
}