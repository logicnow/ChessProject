package com.solarwindsmsp.chess;

public class ChessBoard {

    public static int MAX_BOARD_WIDTH = 7;
    public static int MAX_BOARD_HEIGHT = 7;
    private PieceInterface[][] pieces;
    private Validator validator;
    private ValidatorFactory pieceValidatorFactory;

    public ChessBoard() {
        // 0,0 to 7,7 means 8 position java array
        pieces = new Pawn[MAX_BOARD_WIDTH + 1][MAX_BOARD_HEIGHT + 1];
        validator = new Validator();
        pieceValidatorFactory = new ValidatorFactory();
    }

    public void Add(PieceInterface piece, Coordinates coordinates) {
        piece.setChessBoard(this);
        if (validator.IsLegalBoardPosition(coordinates) &&
                IsPositionFree(coordinates) &&
                pieceValidatorFactory.getValidator(piece.getClass().
                        getSimpleName()).
                        IsValidInitialPosition(piece, coordinates)

        ) {
            piece.setCoordinates(coordinates);
            pieces[coordinates.getX()][coordinates.getY()] = piece;
        } else {
            piece.setCoordinates(new Coordinates(-1, -1));
        }
    }

    public void updatePosition(PieceInterface piece, Coordinates coordinates) {
        if (validator.isPieceOnTheBoard(piece) &&
                pieceValidatorFactory.getValidator(piece.getClass().getSimpleName()).IsValidMove(piece, coordinates)
        ) {
            pieces[piece.getXCoordinate()][piece.getYCoordinate()] = null;
            pieces[coordinates.getX()][coordinates.getY()] = piece;
            piece.setCoordinates(coordinates);
        }
    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        return validator.IsLegalBoardPosition(new Coordinates(xCoordinate, yCoordinate));
    }

    private boolean IsPositionFree(Coordinates coordinates) {
        return getPiece(coordinates) == null;
    }

    public PieceInterface getPiece(Coordinates coordinates) {
        return pieces[coordinates.getX()][coordinates.getY()];
    }

    private class Validator {
        public boolean IsLegalBoardPosition(Coordinates coordinates) {
            return coordinates.getX() >= 0 && coordinates.getX() <= MAX_BOARD_WIDTH
                    && coordinates.getY() >= 0 && coordinates.getY() <= MAX_BOARD_HEIGHT;
        }

        public boolean isPieceOnTheBoard(PieceInterface piece) {
            return !IsPositionFree(new Coordinates(piece.getXCoordinate(), piece.getYCoordinate())) &&
                    getPiece(new Coordinates(piece.getXCoordinate(), piece.getYCoordinate())).equals(piece);

        }
    }
}
