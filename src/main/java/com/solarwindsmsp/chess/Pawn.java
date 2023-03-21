package com.solarwindsmsp.chess;

public class Pawn {

    private ChessBoard chessBoard;
    private int xCoordinate;
    private int yCoordinate;
    private PieceColor pieceColor;

    public Pawn(PieceColor pieceColor) {
        this.pieceColor = pieceColor;
    }

    public void setCoordinates(int xCoordinate, int yCoordinate) { 
        this.xCoordinate = xCoordinate; 
        this.yCoordinate = yCoordinate; 
    }

    public ChessBoard getChessBoard() {
        return chessBoard;
    }

    public void setChessBoard(ChessBoard chessBoard) {
        this.chessBoard = chessBoard;
    }

    public int getXCoordinate() {
        return xCoordinate;
    }

    public void setXCoordinate(int value) {
        this.xCoordinate = value;
    }

    public int getYCoordinate() {
        return yCoordinate;
    }

    public void setYCoordinate(int value) {
        this.yCoordinate = value;
    }

    public PieceColor getPieceColor() {
        return this.pieceColor;
    }

    public void setPieceColor(PieceColor value) {
        pieceColor = value;
    }

    public void Move(MovementType movementType, int newX, int newY) {
        if (movementType == MovementType.MOVE) {
            if (this.pieceColor == PieceColor.BLACK) {
                if (newY == this.yCoordinate - 1 && chessBoard.getPieceAt(newX, newY) == null) {
                    chessBoard.removePiece(this.xCoordinate, this.yCoordinate);
                    this.xCoordinate = newX;
                    this.yCoordinate = newY;
                    chessBoard.Add(this, newX, newY, PieceColor.BLACK);
                }
            } else {
                if (newY == this.yCoordinate + 1 && chessBoard.getPieceAt(newX, newY) == null) {
                    chessBoard.removePiece(this.xCoordinate, this.yCoordinate);
                    this.xCoordinate = newX;
                    this.yCoordinate = newY;
                    chessBoard.Add(this, newX, newY, PieceColor.WHITE);
                }
            }
        } else if (movementType == MovementType.CAPTURE) {
            if (this.pieceColor == PieceColor.BLACK) {
                if (newY == this.yCoordinate - 1 && Math.abs(newX - this.xCoordinate) == 1
                        && chessBoard.getPieceAt(newX, newY) != null
                        && chessBoard.getPieceAt(newX, newY).getPieceColor() == PieceColor.WHITE) {
                    chessBoard.removePiece(newX, newY);
                    chessBoard.removePiece(this.xCoordinate, this.yCoordinate);
                    this.xCoordinate = newX;
                    this.yCoordinate = newY;
                    chessBoard.Add(this, newX, newY, PieceColor.BLACK);
                }
            } else {
                if (newY == this.yCoordinate + 1 && Math.abs(newX - this.xCoordinate) == 1
                        && chessBoard.getPieceAt(newX, newY) != null
                        && chessBoard.getPieceAt(newX, newY).getPieceColor() == PieceColor.BLACK) {
                    chessBoard.removePiece(newX, newY);
                    chessBoard.removePiece(this.xCoordinate, this.yCoordinate);
                    this.xCoordinate = newX;
                    this.yCoordinate = newY;
                    chessBoard.Add(this, newX, newY, PieceColor.WHITE);
                }
            }
        }
    }
    

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format("Current X: {1}{0}Current Y: {2}{0}Piece Color: {3}", eol, xCoordinate, yCoordinate, pieceColor);
    }
}
