package com.solarwindsmsp.chess;

public class ChessBoard {

    public static final int MAX_BOARD_WIDTH = 7;
    public static final int MAX_BOARD_HEIGHT = 7;

    private Pawn[][] pieces;
    private Validator validator;

    public ChessBoard() {
        this.pieces = new Pawn[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];
        this.validator = new Validator();
    }

    public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor) {
        if (this.IsLegalBoardPosition(xCoordinate, yCoordinate) && validator.isValidPawnRow(xCoordinate, pieceColor)) {
            pawn.setChessBoard(this);
            pawn.setXCoordinate(xCoordinate);
            pawn.setYCoordinate(yCoordinate);
            this.pieces[xCoordinate][yCoordinate] = pawn;
        } else {
            pawn.setXCoordinate(-1);
            pawn.setYCoordinate(-1);
        }
    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return validator.isValidCoordinates(xCoordinate, yCoordinate) && validator.isFreePosition(xCoordinate, yCoordinate);
    }

    private class Validator {

        public boolean isFreePosition(int xCoordinate, int yCoordinate) {
            return pieces[xCoordinate][yCoordinate] == null;
        }

        public boolean isValidCoordinates(int xCoordinate, int yCoordinate) {
            return this.isInsideTheTable(xCoordinate, MAX_BOARD_WIDTH) && this.isInsideTheTable(yCoordinate, MAX_BOARD_HEIGHT);
        }

        public boolean isInsideTheTable(int coordinate, int tableLimit) {
            return 0 <= coordinate && coordinate < tableLimit;
        }

        public boolean isValidPawnRow(int xCoordinate, PieceColor pieceColor) {
            if (pieceColor == PieceColor.WHITE) {
                return xCoordinate == 0 || xCoordinate == 1;
            }
            return xCoordinate == MAX_BOARD_HEIGHT - 1 || xCoordinate == MAX_BOARD_HEIGHT;
        }

    }
}
