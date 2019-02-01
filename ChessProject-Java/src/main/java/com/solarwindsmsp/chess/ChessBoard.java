package com.solarwindsmsp.chess;

public class ChessBoard {

    // Setting to 8 because according to the instructions, the board is
    // 0 - 7 (8 numbers total). Fixing testing accordingly
    public static int MAX_BOARD_WIDTH = 8;
    public static int MAX_BOARD_HEIGHT = 8;

    private ChessPiece[][] pieces;

    public ChessBoard() {
        pieces = new ChessPiece[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];

    }

    public void Add(ChessPiece pawn, int xCoordinate, int yCoordinate) {
        if (!IsLegalBoardPosition(xCoordinate, yCoordinate) ||
                pieces[xCoordinate][yCoordinate] != null) {
            xCoordinate = -1;
            yCoordinate = -1;
        } else {
            pieces[xCoordinate][yCoordinate] = pawn;
        }

        pawn.setXCoordinate(xCoordinate);
        pawn.setYCoordinate(yCoordinate);
    }

    /**
     * Moves the piece to a new position on the board and resets the old place
     * @param piece - The piece to move
     * @param prevX - The piece's original x coordinate
     * @param prevY - The piece's original y coordinate
     */
    public void Move(ChessPiece piece, int prevX, int prevY) {
        if (IsLegalBoardPosition(piece.getXCoordinate(), piece.getYCoordinate())) {
            pieces[prevX][prevY] = null;

            pieces[piece.getXCoordinate()][piece.getYCoordinate()] = piece;
        } else { // If it isn't a legal move, then the piece should return to it's previous position
            piece.setXCoordinate(prevX);
            piece.setYCoordinate(prevY);
        }
    }

    public ChessPiece getChessPieceAtPosition(int x, int y) {
        ChessPiece retVal = null;

        if (IsLegalBoardPosition(x, y)) {
            retVal = this.pieces[x][y];
        }

        return retVal;
    }

    public boolean IsSpaceEmpty(int xCoordinate, int yCoordinate) {
        return pieces[xCoordinate][yCoordinate] == null;
    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return xCoordinate >= 0 && yCoordinate >= 0 &&
                xCoordinate < MAX_BOARD_WIDTH && yCoordinate < MAX_BOARD_HEIGHT;
    }
}
