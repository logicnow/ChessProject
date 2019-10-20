package com.solarwindsmsp.chess;

public class Context {
    private Strategy strategy;

    public Context(Strategy strategy){
        this.strategy = strategy;
    }

    public  boolean isLegalPosition(int xCoordinate, int yCoordinate){
        return strategy.isLegalPosition(xCoordinate,yCoordinate);
    }

    public  boolean isValidNumberOfSamePieceType(){
        return strategy.isValidNumberOfSamePieceType();
    }
}
