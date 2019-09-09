package com.solarwindsmsp.chess;

public class Pawn {

    private ChessBoard chessBoard;
    private int xCoordinate;
    private int yCoordinate;
    private PieceColor pieceColor;

    private Validator validator;

    public Pawn(PieceColor pieceColor) {
        this.setPieceColor(pieceColor);
        this.validator = new Validator();
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
        if (movementType == MovementType.MOVE && this.getChesssBoard().IsLegalBoardPosition(newX, newY)) {
            if (validator.isValidNewX(newX) && validator.isValidNewY(newY)) {
                this.setXCoordinate(newX);
                this.setYCoordinate(newY);
            }
        }
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format("Current X: {1}{0}Current Y: {2}{0}Piece Color: {3}", eol, xCoordinate, yCoordinate, pieceColor);
    }

    private class Validator {

        private int getMovingDirection() {
            if (getPieceColor() == PieceColor.BLACK) {
                return -1;
            }
            return 1;
        }

        public boolean isValidNewX(int newX) {
            return newX == xCoordinate + getMovingDirection() * 0 ||
                    newX == xCoordinate + getMovingDirection() * 1;
        }

        public boolean isValidNewY(int newY) {
            return newY == yCoordinate - 1 ||
                    newY == yCoordinate ||
                    newY == yCoordinate + 1;
        }
    }
}
