package com.solarwindsmsp.chess;

public abstract class ChessPiece {

    int xCoordinate;
    int yCoordinate;
    PieceColor pieceColor;

    ChessPiece(PieceColor pieceColor) {
        this.pieceColor = pieceColor;
    }

    int getXCoordinate() {
        return xCoordinate;
    }

    void setXCoordinate(int xCoordinate) {
        this.xCoordinate = xCoordinate;
    }

    int getYCoordinate() {
        return yCoordinate;
    }

    void setYCoordinate(int yCoordinate) {
        this.yCoordinate = yCoordinate;
    }

    PieceColor getPieceColor() {
        return pieceColor;
    }

    void setPieceColor(PieceColor pieceColor) {
        this.pieceColor = pieceColor;
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    private String CurrentPositionAsString() {
        return String.format("Current X: %d Current Y: %d Piece Color: %s",  xCoordinate, yCoordinate, pieceColor);
    }
}