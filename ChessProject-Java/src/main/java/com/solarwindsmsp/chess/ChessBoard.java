package com.solarwindsmsp.chess;

public class ChessBoard {

    private Piece[][] pieces;

    public ChessBoard() {
        pieces = new Piece[ChessUtil.BOARD_SIZE][ChessUtil.BOARD_SIZE];
    }

    public void Add(Piece piece, int xCoordinate, int yCoordinate) {

        if (!this.isLegalBoardPosition(xCoordinate, yCoordinate)) {
            throw new UnsupportedOperationException("Ilegal position for add the piece");
        }
        piece.setChessBoard(this);

        Context context = Context.getInstance(piece);

        if (!context.isValidNumberOfSamePieceType()) {
            throw new UnsupportedOperationException("The maximum number of pieces of the same type has been reached");
        }

        if (!hasPositionFree(xCoordinate, yCoordinate) || context.isLegalPosition(xCoordinate, yCoordinate)) {
            piece.setXCoordinate(-1);
            piece.setYCoordinate(-1);
        } else {
            piece.setXCoordinate(xCoordinate);
            piece.setYCoordinate(yCoordinate);
            pieces[xCoordinate][yCoordinate] = piece;
        }
    }

    public boolean isLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return xCoordinate >= ChessUtil.MIN_BOARD_WIDTH && xCoordinate <= ChessUtil.MAX_BOARD_HEIGHT
                && yCoordinate >= ChessUtil.MIN_BOARD_HEIGHT && yCoordinate <= ChessUtil.MAX_BOARD_WIDTH;
    }

    public Piece[][] getPieces() {
        return this.pieces;
    }

    private boolean hasPositionFree(int xCoordinate, int yCoordinate) {

        return pieces[xCoordinate][yCoordinate] == null;
    }
}
