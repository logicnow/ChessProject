package com.solarwindsmsp.chess;

public interface PieceInterface {

    void setCoordinates(Coordinates value);

    int getXCoordinate();

    int getYCoordinate();

    PieceColor getPieceColor();

    void Move(MovementType movementType, Coordinates value);
}
