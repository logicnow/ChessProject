package com.solarwindsmsp.chess;

public interface PieceValidatorInterface {
    boolean IsValidMove(PieceInterface piece, Coordinates newCoordinates);
    boolean IsValidCapture(PieceInterface piece, Coordinates newCoordinates);
    boolean IsValidInitialPosition(PieceInterface piece, Coordinates newCoordinate);
}
