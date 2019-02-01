package com.solarwindsmsp.chess;

import org.junit.Assert;
import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class PawnTest {

    private ChessBoard chessBoard;
    private Pawn testSubject;

    @Before
    public void setUp() {
        this.chessBoard = new ChessBoard();
        this.testSubject = new Pawn(PieceColor.BLACK, this.chessBoard);
    }

    @Test
    public void testChessBoard_Add_Sets_XCoordinate() {
        this.chessBoard.Add(testSubject, 6, 3);
        assertEquals(6, testSubject.getXCoordinate());
    }

    @Test
    public void testChessBoard_Add_Sets_YCoordinate() {
        this.chessBoard.Add(testSubject, 6, 3);
        assertEquals(3, testSubject.getYCoordinate());
    }


    @Test
    public void testPawn_Move_IllegalCoordinates_Right_DoesNotMove() {
        chessBoard.Add(testSubject, 6, 3);
        testSubject.Move(MovementType.MOVE, 7, 3);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(3, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_IllegalCoordinates_Left_DoesNotMove() {
        chessBoard.Add(testSubject, 6, 3);
        testSubject.Move(MovementType.MOVE, 4, 3);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(3, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates() {
        chessBoard.Add(testSubject, 6, 3);
        testSubject.Move(MovementType.MOVE, 6, 2);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(2, testSubject.getYCoordinate());
    }

    @Test
    public void testIsValidMove_Illegal_Position() {
        chessBoard.Add(testSubject, 7, 7);
        Assert.assertFalse(testSubject.IsValidMove(MovementType.MOVE, 7, 8));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 7, 8));
    }

    @Test
    public void testIsValidMove_Illegal_Movement_X() {
        chessBoard.Add(testSubject, 1, 1);
        Assert.assertFalse(testSubject.IsValidMove(MovementType.MOVE, 4, 1));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.MOVE, 0, 1));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 4, 1));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 0, 1));
    }

    @Test
    public void testIsValidMove_Illegal_Movement_Y() {
        chessBoard.Add(testSubject, 2, 2);
        Assert.assertFalse(testSubject.IsValidMove(MovementType.MOVE, 2, 3));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.MOVE, 2, 0));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 2, 0));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 2, 3));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 2, 1));
    }

    @Test
    public void testIsValidMove_Legal_Movement_Y() {
        chessBoard.Add(testSubject, 1, 1);
        Assert.assertTrue(testSubject.IsValidMove(MovementType.MOVE, 1, 0));
    }

    @Test
    public void testIsValidMove_Legal_Capture_Y() {
        chessBoard.Add(testSubject, 1, 1);
        chessBoard.Add(new Pawn(PieceColor.WHITE, chessBoard), 0, 0);
        chessBoard.Add(new Pawn(PieceColor.WHITE, chessBoard), 2, 0);
        Assert.assertTrue(testSubject.IsValidMove(MovementType.CAPTURE, 0, 0));
        Assert.assertTrue(testSubject.IsValidMove(MovementType.CAPTURE, 2, 0));
    }

    @Test
    public void testIsValidMove_Illegal_Capture_Y() {
        chessBoard.Add(testSubject, 1, 1);
        chessBoard.Add(new Pawn(PieceColor.BLACK, chessBoard), 0, 0);
        chessBoard.Add(new Pawn(PieceColor.BLACK, chessBoard), 2, 0);
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 0, 0));
        Assert.assertFalse(testSubject.IsValidMove(MovementType.CAPTURE, 2, 0));
    }
}