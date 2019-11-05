using System;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoard
    {
        public static readonly int MaxBoardWidth = 7;
        public static readonly int MaxBoardHeight = 7;
        public static Pawn[,] pawnSection;

        private Pawn pawn;

        public ChessBoard ()
        {
            // pieces = new Pawn();
            pawn = new Pawn();
            pawnSection = new Pawn[MaxBoardWidth, MaxBoardHeight];

            //InitializeBoard();
        }



        //
        // PrintBoard to pretify the Consumer output.
        //public void PrintBoard()
        //{
        //    for (int x = 0; x < MaxBoardWidth; x++)
        //    {
        //        for (int y = 0; y < MaxBoardHeight; y++)
        //        {
        //            if (pieces[x, y] == null)
        //            {
        //                Console.Write("  ");
        //            }
        //            else if (pieces[x, y].PieceColor == PieceColor.White)
        //            {
        //                Console.Write("W ");
        //            }
        //            else if (pieces[x, y].PieceColor == PieceColor.Black)
        //            {
        //                Console.Write("B ");
        //            }
        //        }
        //        Console.WriteLine(" ");
        //    }
        //}

    }
}
