package com.solarwindsmsp.chess;

public class PieceFactory {

    public PieceInterface create(String type, PieceColor color) {

        if (type == null) {
            return null;
        }
        if (type.equalsIgnoreCase("Pawn")) {
            Pawn pawn = new Pawn(color);
            pawn.setCoordinates(new Coordinates(-1, -1));

            return pawn;
        }

        return null;
    }
}
