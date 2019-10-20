package com.solarwindsmsp.chess;

public interface PieceInterface {

    void setXCoordinate(int value);

    int getXCoordinate();

    void setYCoordinate(int value);

    int getYCoordinate();

    void setPieceColor(PieceColor pieceColor);

    PieceColor getPieceColor();

    ChessBoard getChessBoard();

    void setChessBoard(ChessBoard chessBoard);

    void Move(MovementType movementType, int newX, int newY);

    // in future
    // void Capture(MovementType movementType, int targetX, int targetY);
}
