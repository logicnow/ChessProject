package com.solarwindsmsp.chess;

public class Pawn extends Piece {

    public Pawn(PieceColor pieceColor) {
        super(pieceColor);
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format(
                "I am a %s Pawn, my position is (%d, %d)",
                getPieceColor(), getXCoordinate(), getYCoordinate()
        );
    }
}
