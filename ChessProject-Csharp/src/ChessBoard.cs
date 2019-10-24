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
            pieces = new Pawn[MaxBoardWidth, MaxBoardHeight];
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return;

            if (pieces[xCoordinate, yCoordinate] != null)
                return;

            pieces[xCoordinate, yCoordinate] = pawn;

            pawn.ChessBoard = this;
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            // Just for the sake of playing with Linq.
            return (Enumerable.Range(0, MaxBoardHeight).Contains(yCoordinate)
                && Enumerable.Range(0, MaxBoardWidth).Contains(xCoordinate));
        }

        public void MovePiece(int xCoordinate, int yCoordinate, int newX, int newY)
        {
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate) || !IsLegalBoardPosition(newX, newY))
                return;

            Pawn piece = pieces[xCoordinate, yCoordinate];
            Add(piece, newX, newY, piece.PieceColor);
            pieces[xCoordinate, yCoordinate] = null;
        }

        public Pawn GetPieceAtPosition(int xCoordinate, int yCoordinate)
        {
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return null;

            return pieces[xCoordinate, yCoordinate];
        }
    }
}
