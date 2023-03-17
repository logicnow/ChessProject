package com.solarwindsmsp.chess;

public class ChessBoard {

    public static final int MAX_BOARD_WIDTH = 7;
    public static final int MAX_BOARD_HEIGHT = 7;

    private Pawn[][] pieces;
    private int blackPawnCount = 0;
    private int whitePawnCount = 0;

    public ChessBoard() {
        pieces = new Pawn[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];
    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return xCoordinate >= 0 && xCoordinate < MAX_BOARD_WIDTH
                && yCoordinate >= 0 && yCoordinate < MAX_BOARD_HEIGHT;
    }

    public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pawnColor) {
        if (!IsLegalBoardPosition(xCoordinate, yCoordinate)) {
            pawn.setCoordinates(-1, -1);
            return;
        }

        if (pieces[xCoordinate][yCoordinate] != null) {
            pawn.setCoordinates(-1, -1);
            return;
        }

        if ((pawnColor == PieceColor.BLACK && blackPawnCount >= MAX_BOARD_WIDTH) ||
                (pawnColor == PieceColor.WHITE && whitePawnCount >= MAX_BOARD_WIDTH)) {
            pawn.setCoordinates(-1, -1);
            return;
        }

        if (pawn.getPieceColor() != pawnColor) {
            pawn.setCoordinates(-1, -1);
            return;
        }

        pieces[xCoordinate][yCoordinate] = pawn;
        pawn.setCoordinates(xCoordinate, yCoordinate);
        pawn.setChessBoard(this);
        if (pawnColor == PieceColor.BLACK) {
            blackPawnCount++;
        } else {
            whitePawnCount++;
        }
    }

    public Pawn getPieceAt(int xCoordinate, int yCoordinate) {
        if (IsLegalBoardPosition(xCoordinate, yCoordinate)) {
            return pieces[xCoordinate][yCoordinate];
        }
        return null;
    }

    public void removePiece(int xCoordinate, int yCoordinate) {
        if (IsLegalBoardPosition(xCoordinate, yCoordinate) && pieces[xCoordinate][yCoordinate] != null) {
            Pawn pawn = pieces[xCoordinate][yCoordinate];
            pieces[xCoordinate][yCoordinate] = null;
            if (pawn.getPieceColor() == PieceColor.BLACK) {
                blackPawnCount--;
            } else {
                whitePawnCount--;
            }
        }
    }

    public int getPawnCount(){
        return blackPawnCount+whitePawnCount;
    }
    
}
