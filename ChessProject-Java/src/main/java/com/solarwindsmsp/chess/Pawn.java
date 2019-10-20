package com.solarwindsmsp.chess;

public class Pawn extends Piece {

    public static int MAX_NUMBERS_OF_SAME_PIECE_TYPE = 8;

    public Pawn(PieceColor pieceColor) {
        super(pieceColor);
    }

    public void Move(MovementType movementType, int newX, int newY) {
        if(this.getChessBoard().isLegalBoardPosition(newX, newY) && this.isLegalPawnPosition(newX, newY)){
            this.setYCoordinate(newY);
        }
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format("Current X: {1}{0}Current Y: {2}{0}PieceInterface Color: {3}", eol, getXCoordinate(), getYCoordinate(), getPieceColor());
    }

    private boolean isLegalPawnPosition(int newX, int newY){
        return newX == this.getXCoordinate() &&
                (isLegalBlackPawnPosition(newY) || isLegalWhitePawnPosition(newY));
    }

    private boolean isLegalBlackPawnPosition(int newY){
        return (PieceColor.BLACK.equals(this.getPieceColor()) && newY < this.getYCoordinate());
    }

    private boolean isLegalWhitePawnPosition(int newY){
        return (PieceColor.WHITE.equals(this.getPieceColor()) && newY > this.getYCoordinate());
    }
}
