package com.solarwindsmsp.chess;

import junit.framework.Assert;
import org.junit.Before;
import org.junit.Test;

import static org.junit.Assert.*;

public class PawnTest {

    private ChessBoard chessBoard;
    private Pawn testSubject;
    private Pawn whitePawn;

    @Before
    public void setUp() {
        this.chessBoard = new ChessBoard();
        this.testSubject = new Pawn(PieceColor.BLACK);
        this.whitePawn = new Pawn(PieceColor.WHITE);
    }

    @Test
    public void testChessBoard_Add_Sets_XCoordinate() {
        this.chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        assertEquals(6, testSubject.getXCoordinate());
    }

    @Test
    public void testChessBoard_Add_Sets_YCoordinate() {
        this.chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        assertEquals(3, testSubject.getYCoordinate());
    }


    @Test
    public void testPawn_Move_IllegalCoordinates_Right_DoesNotMove() {
        chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        testSubject.Move(MovementType.MOVE, 7, 3);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(3, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_IllegalCoordinates_Left_DoesNotMove() {
        chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        testSubject.Move(MovementType.MOVE, 4, 3);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(3, testSubject.getYCoordinate());
    }

    @Test
    public void testPawn_Move_LegalCoordinates_Forward_UpdatesCoordinates() {
        chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        testSubject.Move(MovementType.MOVE, 6, 2);
        assertEquals(6, testSubject.getXCoordinate());
        assertEquals(2, testSubject.getYCoordinate());
    }

    @Test
    public void testWhite_Pawn_Takes_Black_Pawn() {
        this.chessBoard.Add(testSubject, 5, 4, PieceColor.BLACK);
        this.chessBoard.Add(whitePawn, 6, 3, PieceColor.WHITE);


        whitePawn.Move(MovementType.CAPTURE, 5, 4);
        
        assertEquals(this.chessBoard.getPieceAt(5,4).getPieceColor(), PieceColor.WHITE);
        assertEquals(this.chessBoard.getPieceAt(6,3), null);
        assertEquals(chessBoard.getPawnCount(),1);
    }

    @Test
    public void testWhite_Pawn_Can_Not_Take_Black_Pawn_Which_Is_Behind_It() {
        this.chessBoard.Add(testSubject, 6, 3, PieceColor.BLACK);
        this.chessBoard.Add(whitePawn, 5, 4, PieceColor.WHITE);

        whitePawn.Move(MovementType.CAPTURE, 6, 3);
        
        assertEquals(this.chessBoard.getPieceAt(5,4).getPieceColor(), PieceColor.WHITE);
        assertEquals(this.chessBoard.getPieceAt(6,3).getPieceColor(), PieceColor.BLACK);
        assertEquals(chessBoard.getPawnCount(),2);
    }


    @Test
    public void testBlack_Pawn_Takes_White_Pawn() {
        this.chessBoard.Add(testSubject, 5, 4, PieceColor.BLACK);
        this.chessBoard.Add(whitePawn, 6, 3, PieceColor.WHITE);


        testSubject.Move(MovementType.CAPTURE, 6, 3);
        
        assertEquals(this.chessBoard.getPieceAt(6,3).getPieceColor(), PieceColor.BLACK);
        assertEquals(this.chessBoard.getPieceAt(5,4), null);
        assertEquals(chessBoard.getPawnCount(),1);
    }

}