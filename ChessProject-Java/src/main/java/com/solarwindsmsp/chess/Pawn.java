package com.solarwindsmsp.chess;

public class Pawn extends Piece {

    public static int MAX_NUMBERS_OF_SAME_PIECE_TYPE = 8;

    public Pawn(PieceColor pieceColor) {
        super(pieceColor);
    }

    public void Move(MovementType movementType, int newX, int newY) {
        if(
            this.getChessBoard().isLegalBoardPosition(newX, newY)
            && this.isLegalPawnPosition(newX, newY, MovementType.MOVE)
        ){
            this.setYCoordinate(newY);
        }
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format(
                "Current X: {1}{0}Current Y: {2}{0}PieceInterface Color: {3}",
                eol,
                getXCoordinate(),
                getYCoordinate(),
                getPieceColor()
        );
    }

    private boolean isLegalPawnPosition(int newX, int newY, MovementType action){

        if (action.equals(MovementType.MOVE)) {
            return newX == this.getXCoordinate()
                   && (isLegalBlackPawnPosition(newY, action) || isLegalWhitePawnPosition(newY, action));
        }
        // we need implement for MovementType.CAPTURE
        return false;

    }

    private boolean isLegalBlackPawnPosition(int newY, MovementType action){
        if (action.equals(MovementType.MOVE)) {
            return (PieceColor.BLACK.equals(this.getPieceColor()) && newY < this.getYCoordinate());
        }
        // we need implement for MovementType.CAPTURE
        return false;
    }

    private boolean isLegalWhitePawnPosition(int newY, MovementType action){
        if (action.equals(MovementType.MOVE)) {
            return (PieceColor.WHITE.equals(this.getPieceColor()) && newY > this.getYCoordinate());
        }
        // we need implement for MovementType.CAPTURE
        return false;
    }
}
