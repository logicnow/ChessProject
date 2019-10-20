package com.solarwindsmsp.chess;

public class StrategyFactory {

    public Strategy createPieceStrategy(Piece piece) {
        // we need implement a strategy for every type of chess piece
        if(piece instanceof Pawn){
            return new PawnStrategy((Pawn) piece);
        }
        return null;
    }
}
