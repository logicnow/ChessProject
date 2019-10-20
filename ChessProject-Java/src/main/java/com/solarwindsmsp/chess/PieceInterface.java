package com.solarwindsmsp.chess;

public interface PieceInterface {

    public void setXCoordinate(int value);

    public int getXCoordinate();

    public void setYCoordinate(int value);

    public int getYCoordinate();

    public void setPieceColor(PieceColor pieceColor);

    public PieceColor getPieceColor();

    public ChessBoard getChessBoard();

    public void setChessBoard(ChessBoard chessBoard);

    public void Move(MovementType movementType, int newX, int newY);

    // in future
    // public void Capture(MovementType movementType, int targetX, int targetY);
}
