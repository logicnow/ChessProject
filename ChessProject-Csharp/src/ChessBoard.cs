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

            Console.WriteLine("board is: {0}x{1}", MaxBoardHeight+1, MaxBoardWidth+1); // index starts from 0

            InitializeBoard();

        }

        // Add Pawn to Board Coordinates
        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;
            pawn.PieceColor = pieceColor;  
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            //
            // TODO: Check side move on xCoordinate
            //
            if (xCoordinate < 0 && yCoordinate < 0)
            {
                if (xCoordinate > MaxBoardWidth + 1 && yCoordinate > MaxBoardHeight + 1)
                {
                    return true;
                }
            }

            return false;
        }

        public void InitializeBoard()
        {
            for (int x = 0; x <= MaxBoardWidth; x++)
            {
                for (int y = 0; y <= MaxBoardHeight; y++)
                {
                    pw = new Pawn(PieceColor.Black); // pawn to add
                    this.Add(pw, x, y, PieceColor.Black);
                    //Console.WriteLine("Current X: {1}{0}Current Y: {2}{0}Piece Color: {3}", Environment.NewLine, x, y, PieceColor.Black);
                    Console.WriteLine(pw.ToString());
                    //
                    //TODO: Add only 2 rows at top and 2 rows at bottom. / White - Black
                }
                
            }

        }

    }
}
