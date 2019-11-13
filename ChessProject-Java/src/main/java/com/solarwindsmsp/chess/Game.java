package com.solarwindsmsp.chess;

public class Game {
    public static void main(String[] args) {
        ChessBoard board = new ChessBoard();
        Pawn blackPawn = new Pawn(PieceColor.BLACK);
        Pawn whitePawn = new Pawn(PieceColor.WHITE);

        board.Add(blackPawn, new Coordinates(1, 6));
        board.Add(whitePawn, new Coordinates(1, 1));

        blackPawn.Move(MovementType.MOVE, new Coordinates(1, 5));
        whitePawn.Move(MovementType.MOVE, new Coordinates(1, 2));

        System.out.println(blackPawn);
        System.out.println(whitePawn);
    }
}
