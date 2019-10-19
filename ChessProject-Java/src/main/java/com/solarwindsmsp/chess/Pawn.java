package com.solarwindsmsp.chess;

public class Pawn {

    private ChessBoard chessBoard;
    private int xCoordinate;
    private int yCoordinate;
    private PieceColor pieceColor;

    public Pawn(PieceColor pieceColor) {
        this.pieceColor = pieceColor;
    }

    public ChessBoard getChesssBoard() {
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

    private void setPieceColor(PieceColor value) {
        pieceColor = value;
    }

    /**
     * Sets the pawn to its new position if and only if:
     * - the new coordinates are not outside the chessboard
     * - the new coordinates are valid with the current coordinates of the pawn
     * - the new coordinates are valid with the color of the pawn
     * - there is no piece at the new coordinates
     * 
     * @param movementType
     * @param newX
     * @param newY 
     */
    public void Move(MovementType movementType, int newX, int newY) {
        if(null==movementType){
            throw new UnsupportedOperationException("This move is not supported by the object Pawn") ;
        }
        else switch (movementType) {
            case MOVE:
                //pieceDirection is used to detect the direction of the pawn on the X axis
                int pieceDirection = (this.pieceColor==PieceColor.BLACK?-1:1);
                if(this.chessBoard!=null &&
                        this.chessBoard.IsLegalBoardPosition(newX,newY) &&
                        this.chessBoard.IsFreeBoardPosition(newX, newY) &&
                        newY == this.yCoordinate+pieceDirection &&
                        newX == this.xCoordinate){
                    this.xCoordinate=newX;
                    this.yCoordinate=newY;
                }   break;
            case CAPTURE:
                throw new UnsupportedOperationException("Need to implement Pawn.Capture()") ;
            default:
                throw new UnsupportedOperationException("This move is not supported by the object Pawn") ;
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
