package com.solarwindsmsp.chess;

abstract class Piece implements PieceInterface {
    private Coordinates coordinates;
    private PieceColor color;

    public Piece(PieceColor color) {
        this.color = color;
    }

    public void setCoordinates(Coordinates value) {
        this.coordinates = value;
    }

    public int getXCoordinate() {
        return coordinates.getX();
    }

    public int getYCoordinate() {
        return coordinates.getY();
    }

    public PieceColor getPieceColor() {
        return color;
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    protected String CurrentPositionAsString() {
        String eol = System.lineSeparator();
        return String.format(
                "Current X: %d Current Y: %d Piece Color: %s",
                getXCoordinate(), getYCoordinate(), getPieceColor()
        );
    }
}
