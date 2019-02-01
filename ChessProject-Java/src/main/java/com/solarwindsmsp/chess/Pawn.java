package com.solarwindsmsp.chess;

public class Pawn extends ChessPiece {
    public Pawn(PieceColor pieceColor, ChessBoard board) {
        super(pieceColor, board);
    }

    @Override
    boolean IsValidMove(MovementType movType, int newX, int newY) {
        boolean retVal = false;

        if (this.getChesssBoard().IsLegalBoardPosition(newX, newY)) {
            switch (movType) {
                case MOVE: {
                    // Multiplying by the ymovedirection to make sure that it is going in the right direction
                    // Also if moving, need to make sure there isn't a piece already in place
                    retVal = newX == this.getXCoordinate() &&
                            newY == (this.getYCoordinate() + (1 * getYMoveDirection())) &&
                            this.getChesssBoard().IsSpaceEmpty(newX,newY);

                    break;
                }
                case CAPTURE: {
                    // Multiplying by the ymovedirection to make sure that it is going in the right direction
                    // Also if moving, need to make sure there is a piece already in place, because it needs
                    // to be captured
                    retVal = (newX == (this.getXCoordinate() + 1) || newX == (this.getXCoordinate() - 1)) &&
                            newY == (this.getYCoordinate() + (1 * getYMoveDirection())) &&
                            !this.getChesssBoard().IsSpaceEmpty(newX,newY) &&
                            this.getChesssBoard().getChessPieceAtPosition(newX, newY).getPieceColor() != this.getPieceColor();

                    break;
                }
            }
        }

        return retVal;
    }
}
