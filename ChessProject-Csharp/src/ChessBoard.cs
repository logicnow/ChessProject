using System;
using System.Linq;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoard
    {
        public static readonly int MaxBoardWidth = 7;
        public static readonly int MaxBoardHeight = 7;
        private Pawn[,] pieces;

        public ChessBoard ()
        {
            // for the moment we're playing just with pawns but will create more possibilities for the future
            // we need to consider also kings, bishopsh, knigths and so...
            pieces = new Pawn[MaxBoardWidth, MaxBoardHeight];
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            // chck if play board is ok with this new position
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return;

            // is the position already occupied?
            if (pieces[xCoordinate, yCoordinate] != null)
                return;

            // assign the new chess piece to the desired position
            pieces[xCoordinate, yCoordinate] = pawn;

            pawn.ChessBoard = this;
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;

            // should we check if we need to unassign the old position from the board?
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            // Just for the sake of playing with Linq. Of course this is not the optimal way of checking it
            return (Enumerable.Range(0, MaxBoardHeight).Contains(yCoordinate)
                && Enumerable.Range(0, MaxBoardWidth).Contains(xCoordinate));
        }

        public void MovePiece(int xCoordinate, int yCoordinate, int newX, int newY)
        {
            // check with the board if the new position is valid
            if (!IsLegalBoardPosition(newX, newY))
                return;

            Pawn piece = pieces[xCoordinate, yCoordinate];
            Add(piece, newX, newY, piece.PieceColor);

            // unassign the old position for this piece
            pieces[xCoordinate, yCoordinate] = null;
        }

        public Pawn GetPieceAtPosition(int xCoordinate, int yCoordinate)
        {
            // Check if the position is in range, then return the piece if any
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return null;

            return pieces[xCoordinate, yCoordinate];
        }
    }
}
