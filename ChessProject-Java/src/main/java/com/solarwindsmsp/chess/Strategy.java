package com.solarwindsmsp.chess;

public interface Strategy {

     boolean isLegalPosition(int xCoordinate, int yCoordinate);

     boolean isValidNumberOfSamePieceType();
}
