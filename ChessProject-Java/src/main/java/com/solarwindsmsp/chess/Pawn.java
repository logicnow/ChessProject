package com.solarwindsmsp.chess;

public class Pawn extends Piece {

    public Pawn(PieceColor pieceColor) {
        super(pieceColor);
    }

    public void Move(MovementType movementType, Coordinates coordinates) {
        if (this.IsValidMove(movementType, coordinates)) {
            this.setCoordinates(coordinates);
        }
    }

    private boolean IsValidMove(MovementType movementType, Coordinates newCoordinates) {
        boolean directionCondition = newCoordinates.getY() > this.getYCoordinate();
        if (PieceColor.BLACK.equals(this.getPieceColor())) {
            directionCondition = newCoordinates.getY() < this.getYCoordinate();
        }

        return Math.abs(newCoordinates.getY() - this.getYCoordinate()) == 1 &&
                movementType.equals(MovementType.MOVE) && directionCondition;
    }
}
