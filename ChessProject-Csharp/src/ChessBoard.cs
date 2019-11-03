using System;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoard
    {
        public static readonly int MaxBoardWidth = 7; // 8x8 2D array
        public static readonly int MaxBoardHeight = 7;
        private Pawn[,] pieces; 

        public ChessBoard ()
        {
            pieces = new Pawn[MaxBoardWidth, MaxBoardHeight];
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            throw new NotImplementedException("Need to implement ChessBoard.Add()");
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            if (xCoordinate < 0 || yCoordinate < 0)
            {
                if (xCoordinate > MaxBoardWidth + 1 || yCoordinate > MaxBoardHeight + 1)
                {
                    return true;
                }
            }

            return false;
        }

    }
}
