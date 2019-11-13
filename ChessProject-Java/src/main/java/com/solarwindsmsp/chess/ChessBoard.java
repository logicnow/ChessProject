package com.solarwindsmsp.chess;

public class ChessBoard {

    public static int MAX_BOARD_WIDTH = 7;
    public static int MAX_BOARD_HEIGHT = 7;
    private PieceInterface[][] pieces;

    public ChessBoard() {
        // 0,0 to 7,7 means 8 position java array
        pieces = new Pawn[MAX_BOARD_WIDTH + 1][MAX_BOARD_HEIGHT + 1];
    }

    public void Add(PieceInterface piece, Coordinates coordinates) {
        if (this.IsLegalBoardPosition(coordinates.getX(), coordinates.getY()) &&
                IsPositionFree(coordinates)) {
            piece.setCoordinates(coordinates);
            pieces[coordinates.getX()][coordinates.getY()] = piece;
        } else {
            piece.setCoordinates(new Coordinates(-1, -1));
        }
    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return xCoordinate >= 0 && xCoordinate <= MAX_BOARD_WIDTH
                && yCoordinate >= 0 && yCoordinate <= MAX_BOARD_HEIGHT;
    }

    private boolean IsPositionFree(Coordinates coordinates) {
        return pieces[coordinates.getX()][coordinates.getY()] == null;
    }
}
