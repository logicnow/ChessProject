package com.solarwindsmsp.chess;

public class Pawn extends ChessPiece implements ChessPieceInterface{


    public Pawn(PieceColor pieceColor) {
        super(pieceColor);
    }

    public void move(MovementType movementType, int newX, int newY) {
        if (allowedMove(pieceColor, newX, newY)){
            setYCoordinate(newY);
            setXCoordinate(newX);
        }
    }

    public boolean allowedMove(PieceColor pieceColor, int newX, int newY) {
        if(pieceColor.equals(PieceColor.BLACK) && (newX == this.xCoordinate) && (newY == (this.yCoordinate - 1))){
            return true;
        }
        if(pieceColor.equals(PieceColor.WHITE) && (newX == this.xCoordinate) && (newY == (this.yCoordinate + 1))){
            return true;
        }
        return false;
    }
}
