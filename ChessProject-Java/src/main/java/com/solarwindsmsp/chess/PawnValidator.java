package com.solarwindsmsp.chess;

public class PawnValidator implements PieceValidatorInterface {

    public boolean IsValidMove(PieceInterface piece, Coordinates newCoordinates) {
        boolean directionCondition = newCoordinates.getY() > piece.getYCoordinate();
        if (PieceColor.BLACK.equals(piece.getPieceColor())) {
            directionCondition = newCoordinates.getY() < piece.getYCoordinate();
        }

        return Math.abs(newCoordinates.getY() - piece.getYCoordinate()) == 1 && directionCondition;
    }

    public boolean IsValidCapture(PieceInterface piece, Coordinates newCoordinates) {
        throw new UnsupportedOperationException("Need to implement PawnValidator.IsValidCapture()");
    }

    public boolean IsValidInitialPosition(PieceInterface piece, Coordinates newCoordinate) {
        boolean test = newCoordinate.getY() == 1;
        if (PieceColor.BLACK.equals(piece.getPieceColor())) {
            test = newCoordinate.getY() == 6;
        }

        return test;
    }
}
