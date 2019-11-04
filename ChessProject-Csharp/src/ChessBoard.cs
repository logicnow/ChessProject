using System;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoard
    {
        public static readonly int MaxBoardWidth = 7;
        public static readonly int MaxBoardHeight = 7;
        public static Pawn[,] pieces;

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
                    if (x == 0 || x == 1 ) // add to top 2 and bottom 2
                    {
                        pieces[x, y] = new Pawn(PieceColor.White);
                        pieces[x, y].Add(pieces[x, y], x, y, PieceColor.White); 

                        Console.WriteLine(pieces[x, y].ToString());
                    }
                    if( x == MaxBoardWidth - 1 || x == MaxBoardWidth - 2)
                    {
                        pieces[x, y] = new Pawn(PieceColor.Black);
                        pieces[x, y].Add(pieces[x, y], x, y, PieceColor.Black);

                        Console.WriteLine(pieces[x, y].ToString());

                    }
                }
            }
        }

        //
        // PrintBoar to pretify the Consumer output.
        public void PrintBoard()
        {
            for (int x = 0; x < MaxBoardWidth; x++)
            {
                for (int y = 0; y < MaxBoardHeight; y++)
                {
                    if (pieces[x, y] == null)
                    {
                        Console.Write("  ");
                    }
                    else if (pieces[x, y].PieceColor == PieceColor.White)
                    {
                        Console.Write("W ");
                    }
                    else if (pieces[x, y].PieceColor == PieceColor.Black)
                    {
                        Console.Write("B ");
                    }
                }
                Console.WriteLine(" ");
            }
        }

    }
}
