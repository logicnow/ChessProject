package com.solarwindsmsp.chess;

abstract class Piece implements PieceInterface {
    private Coordinates coordinates;
    private PieceColor color;
    private ChessBoard board;
    private ValidatorFactory pieceValidatorFactory;

    public Piece(PieceColor color) {
        this.color = color;
        pieceValidatorFactory = new ValidatorFactory();
    }

    public void setChessBoard(ChessBoard value) {
        this.board = value;
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

    public void Move(MovementType movementType, Coordinates coordinates) {
        if (movementType.equals(MovementType.MOVE) &&
                pieceValidatorFactory.getValidator(this.getClass().getSimpleName()).IsValidMove(this, coordinates)
        ) {
            this.board.updatePosition(this, coordinates);
        } else if (movementType.equals(MovementType.CAPTURE) &&
                pieceValidatorFactory.getValidator(this.getClass().getSimpleName()).IsValidCapture(this, coordinates)
        ) {
            // capture
        }
    }

    @Override
    public boolean equals(Object o) {
        if (this.getClass() != o.getClass()) {
            return false;
        }
        Piece other = (Piece) o;

        return this.getXCoordinate() == other.getXCoordinate() &&
                this.getYCoordinate() == other.getYCoordinate();
    }

    @Override
    public String toString() {
        return CurrentPositionAsString();
    }

    abstract String CurrentPositionAsString();
}
