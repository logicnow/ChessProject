package com.solarwindsmsp.chess;

public class ChessBoard {

    public static int MAX_BOARD_WIDTH = 8;
    public static int MAX_BOARD_HEIGHT = 8;

    private Pawn[][] pieces;

    public ChessBoard() {
        pieces = new Pawn[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];

    }

    /**
     * Adds to the ChessBoard the pawn at the given coordinates and update its coordinates if and only if:
     * - the position is not outside the chessboard
     * - there is not already a pawn at the given coordinates
     * - there are already MAX_BOARD_WIDTH pawns on the chessboard having the pieceColor
     * Otherwise, it sets to "-1" the coordinates of the pawn given in parameter
     * 
     * @param pawn
     * @param xCoordinate
     * @param yCoordinate
     * @param pieceColor 
     */
    public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor) {
        if(pawn==null){
            //Avoids NullPointerExceptions
            return;
        }
        
        if(!this.IsLegalBoardPosition(xCoordinate,yCoordinate) ||
                this.pieces[xCoordinate][yCoordinate] != null ||
                this.countPawns(pieceColor)==MAX_BOARD_WIDTH){
            pawn.setXCoordinate(-1);
            pawn.setYCoordinate(-1);
            return;
        }
        
        pawn.setXCoordinate(xCoordinate);
        pawn.setYCoordinate(yCoordinate);
        pawn.setChessBoard(this);
        pieces[xCoordinate][yCoordinate]=pawn;
        
    }
    
    /**
     * Returns the number of Pawns on the ChessBoard having the pieceColor
     * 
     * @param pieceColor
     * @return 
     */
    private int countPawns(PieceColor pieceColor){
        int nbPawns = 0;
        for(int i=0;i<MAX_BOARD_WIDTH;i++){
            for(int j=0;j<MAX_BOARD_HEIGHT;j++){
                if(pieces[i][j]!=null && pieces[i][j].getPieceColor()==pieceColor){
                    nbPawns++;
                }
            }
        }
        return nbPawns;
    }
    
    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
        //The position is legal if it respects 4 conditions
        return (xCoordinate>=0 && 
                yCoordinate>=0 && 
                xCoordinate<MAX_BOARD_HEIGHT && 
                yCoordinate<MAX_BOARD_WIDTH);
    }
    
    public boolean IsFreeBoardPosition(int xCoordinate, int yCoordinate){
        //The position is free if there is no piece at these coordinates
        return(IsLegalBoardPosition(xCoordinate, yCoordinate) && 
                this.pieces[xCoordinate][yCoordinate]==null);
    }
}
