using System;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoard
    {
        public static readonly int MaxBoardWidth = 7; // 8x8 2D array
        public static readonly int MaxBoardHeight = 7;
        private Pawn[,] pieces;
        private Pawn pw;

        public ChessBoard ()
        {
            pieces = new Pawn[MaxBoardWidth, MaxBoardHeight];

            pw = new Pawn(PieceColor.Black); // pawn to add
            Add(pw, 1, 1, PieceColor.Black);
           // PrintExampleBoard();
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;
            pawn.PieceColor = pieceColor;
            // throw new NotImplementedException("Need to implement ChessBoard.Add()");
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            //
            // TODO: Check side move on xCoordinate
            //
            if (xCoordinate < 0 || yCoordinate < 0)
            {
                if (xCoordinate > MaxBoardWidth + 1 || yCoordinate > MaxBoardHeight + 1)
                {
                    return true;
                }
            }

            return false;
        }

        public void PrintExampleBoard()
        {
            for (int x = 0; x <= MaxBoardWidth; x++)
            {
                for (int y = 0; y <= MaxBoardHeight; y++)
                {

                    Console.Write("X ");


                }
                Console.WriteLine("");
            }

        }

    }
}
