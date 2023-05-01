package com.solarwindsmsp.chess;

public class ChessBoard {

    public static int MAX_BOARD_WIDTH = 7;
    public static int MAX_BOARD_HEIGHT = 7;
      int MAX_NUMBER_PAWN_BLACK = 8;
      int MAX_NUMBER_PAWN_WHITE = 8;


    private Pawn[][] pieces;

    public ChessBoard() {
        pieces = new Pawn[MAX_BOARD_WIDTH][MAX_BOARD_HEIGHT];

    }

    public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor) {
       // throw new UnsupportedOperationException("Need to implement ChessBoard.add()");

    	try {
    		if( IsLegalBoardPosition(xCoordinate, yCoordinate)){
    	           
    	            if(pieceColor.equals(PieceColor.BLACK) && MAX_NUMBER_PAWN_BLACK>0 && pieces[xCoordinate][yCoordinate]==null ){
    	                pawn.setXCoordinate(xCoordinate);
    	                pawn.setYCoordinate(yCoordinate);
    	                pieces[xCoordinate][yCoordinate] = pawn;
    	                MAX_NUMBER_PAWN_BLACK--;
    	            }else if(pieceColor.equals(PieceColor.WHITE) && MAX_NUMBER_PAWN_WHITE>0 && pieces[xCoordinate][yCoordinate]==null) {
    	            	pawn.setXCoordinate(xCoordinate);
    	                pawn.setYCoordinate(yCoordinate);
    	                pieces[xCoordinate][yCoordinate] = pawn;
    	                MAX_NUMBER_PAWN_WHITE--;
    	            }else {
        	        	pawn.setYCoordinate(-1);
        	       		pawn.setXCoordinate(-1);
        	           }
    	           }
    	        
    	}catch(ArrayIndexOutOfBoundsException aie) {
    		pawn.setYCoordinate(-1);
    		pawn.setXCoordinate(-1);
    	}
    	
        

    }

    public boolean IsLegalBoardPosition(int xCoordinate, int yCoordinate) {
       // throw new UnsupportedOperationException("Need to implement ChessBoard.IsLegalBoardPosition()");
       
       if(7>=xCoordinate && xCoordinate>=0 && 7>=yCoordinate && yCoordinate>=0){
        return true;
       }

       return false;
    
    }
}
