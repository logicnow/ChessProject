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
         public void InitializeBoard()
        {
            for (int x = 0; x <= MaxBoardWidth; x++)
            {
                for (int y = 0; y <= MaxBoardHeight; y++)
                {
                    pw = new Pawn(PieceColor.Black); // pawn to add
                    pw.Add(pw, x, y, PieceColor.Black);
                    //Console.WriteLine("Current X: {1}{0}Current Y: {2}{0}Piece Color: {3}", Environment.NewLine, x, y, PieceColor.Black);
                    Console.WriteLine(pw.ToString());
                    //
                    //TODO: Add only 2 rows at top and 2 rows at bottom. / White - Black
                }
            }
        }

    }
}
