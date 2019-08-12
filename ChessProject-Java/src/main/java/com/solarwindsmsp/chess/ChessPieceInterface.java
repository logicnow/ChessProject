package com.solarwindsmsp.chess;

public interface ChessPieceInterface {

    void move(MovementType movementType, int newX, int newY) ;

    boolean allowedMove(PieceColor pieceColor, int newX, int newY);

}
