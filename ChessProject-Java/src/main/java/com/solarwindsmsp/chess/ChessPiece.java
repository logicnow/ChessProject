package com.solarwindsmsp.chess;

public abstract class ChessPiece {
    private ChessBoard chessBoard;
    private int xCoordinate;
    private int yCoordinate;
    private PieceColor pieceColor;

    public ChessPiece(PieceColor pieceColor, ChessBoard chessBoard) {
        this.pieceColor = pieceColor;
        this.chessBoard = chessBoard;
    }

    public ChessBoard getChesssBoard() {
        return chessBoard;
    }

    public void setChessBoard(ChessBoard chessBoard) {
        this.chessBoard = chessBoard;
    }

    public int getXCoordinate() {
        return xCoordinate;
    }

    public void setXCoordinate(int value) {
        this.xCoordinate = value;
    }

    public int getYCoordinate() {
        return yCoordinate;
    }

    public void setYCoordinate(int value) {
        this.yCoordinate = value;
    }

    public PieceColor getPieceColor() {
        return this.pieceColor;
    }

    private void setPieceColor(PieceColor value) {
        pieceColor = value;
    }

    public void Move(MovementType movementType, int newX, int newY) {
        if (this.IsValidMove(movementType, newX, newY)) {
            int prevX = this.xCoordinate;
            int prevY = this.yCoordinate;

            this.setXCoordinate(newX);
            this.setYCoordinate(newY);

            this.getChesssBoard().Move(this, prevX, prevY);
        }
    }

    abstract boolean IsValidMove(MovementType movType, int newX, int newY);

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format("Current X: %2$s%1$sCurrent Y: %3$s%1$sPiece Color: %4$s", eol, xCoordinate, yCoordinate, pieceColor);
    }

    /**
     * The purpose of this function is to supply the user the direction the chess piece
     * should go up and down. If it's white, the y axis goes up, and if it's a black
     * piece, the y axis should go down
     * @return - If white 1, if black -1
     */
    protected int getYMoveDirection() {
        int retVal = 1;

        if (this.getPieceColor().equals(PieceColor.BLACK)) {
            retVal = -1;
        }

        return retVal;
    }
}
