package com.solarwindsmsp.chess;

public class ChessBoard {

    static int MAX_BOARD_WIDTH = 7;
    static int MAX_BOARD_HEIGHT = 7;

    ChessPiece[][] pieces;

    public ChessBoard() {
        this.pieces = new ChessPiece[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];

    }

    void add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor) {
        pawn.setPieceColor(pieceColor);
        if(isLegalBoardPosition(xCoordinate, yCoordinate) && pieces[xCoordinate][yCoordinate] == null){
            pieces[xCoordinate][yCoordinate] = pawn;
            pawn.setXCoordinate(xCoordinate);
            pawn.setYCoordinate(yCoordinate);
        } else {
            pawn.setXCoordinate(-1);
            pawn.setYCoordinate(-1);
        }

    }

    boolean isLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return (xCoordinate >= 0 && xCoordinate <= MAX_BOARD_WIDTH && yCoordinate >= 0 && yCoordinate <= MAX_BOARD_HEIGHT );
    }
}
