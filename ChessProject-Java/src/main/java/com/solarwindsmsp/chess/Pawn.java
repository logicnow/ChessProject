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
        return (xCoordinate < chessBoard.MAX_BOARD_WIDTH) ? xCoordinate : -1;
    }

    public void setXCoordinate(int value) {
        this.xCoordinate = value;
    }

    public int getYCoordinate()
    {
        return (yCoordinate < chessBoard.MAX_BOARD_HEIGHT) ? yCoordinate : -1;
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

    public void Move(MovementType movementType, int newX, int newY) {
        switch (movementType) {
            case MOVE:
                if (pieceColor.equals(PieceColor.WHITE)) {
                    if (getChesssBoard().getCellInfo(newX, newY) == null && newX == getXCoordinate() && newY == getYCoordinate() + 1)
                    {
                        setXCoordinate(newX);
                        setYCoordinate(newY);
                    }
                } else {
                    if (getChesssBoard().getCellInfo(newX, newY) == null && newX == getXCoordinate() && newY == getYCoordinate() - 1)
                    {
                        setXCoordinate(newX);
                        setYCoordinate(newY);
                    }
                }

                break;
            case CAPTURE:

                if (getChesssBoard().getCellInfo(newX, newY) != null && getChesssBoard().getCellInfo(newX, newY).pieceColor != getPieceColor()
                    && (Math.abs(newX - xCoordinate) + Math.abs(newY - yCoordinate)) == 2
                )
                {
                    setXCoordinate(newX);
                    setYCoordinate(newY);
                }
                break;
            default:
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
