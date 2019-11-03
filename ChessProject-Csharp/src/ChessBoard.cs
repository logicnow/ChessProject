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

            Console.WriteLine("board is: {0}x{1}", MaxBoardHeight+1, MaxBoardWidth+1); // index starts from 0

            InitializeBoard();
        }

         public void InitializeBoard()
        {
            for (int x = 0; x < MaxBoardWidth; x++)
            {
                for (int y = 0; y < MaxBoardHeight; y++)
                {

                    if (x == 0 || x == 1 || x == MaxBoardWidth - 1 || x == MaxBoardWidth - 2) // add to top 2 and bottom 2
                    {
                         pieces[x, y] = new Pawn(PieceColor.White);
                         pieces[x, y].Add(pieces[x, y], x, y, PieceColor.White);

                        Console.WriteLine(pieces[x, y].ToString());
                    }
                    //
                    //TODO: Add only 2 rows at top and 2 rows at bottom. / Specify White - Black

                }
            }
        }

    }
}
