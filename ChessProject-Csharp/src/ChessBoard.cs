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
            pawnSection = new Pawn[MaxBoardWidth, MaxBoardHeight];

            pawn = new Pawn();

            //pawn.PieceColor = PieceColor.White;

            InitializeBoard();
        }
        //
        // TODO: implemnet Class BoardPiece, using this to initialize the board.
        public void InitializeBoard()
        {
            for (int x = 0; x < ChessBoard.MaxBoardWidth; x++)
            {
                for (int y = 0; y < ChessBoard.MaxBoardHeight; y++)
                {
                    if (x == 0 || x == 1) // add to top 2 and bottom 2
                    {
                        //bpawns[x, y] = new Pawn();
                        //bpawns[x, y].Add(bpawns[x, y], x, y, PieceColor.White);
                        //ChessBoard.pawnSection[1, 1].Add(ChessBoard.pawnSection[1, 1], 1, 1, PieceColor.Black);

                        pawn.XCoordinate = x;
                        pawn.YCoordinate = y;
                        pawn.PieceColor = PieceColor.White;
                        BoardPiece.bpawns[x, y] = pawn;
                       // pawnSection[1, 1].Add(pawn);
                        //Console.WriteLine(pieces[x, y].ToString());
                    }
                    if (x == ChessBoard.MaxBoardWidth - 1 || x == ChessBoard.MaxBoardWidth - 2)
                    {
                        pawn.XCoordinate = x;
                        pawn.YCoordinate = y;
                        pawn.PieceColor = PieceColor.Black;
                        BoardPiece.bpawns[x, y] = pawn;
                        //bpawns[x, y] = new Pawn();
                        // pawnSection[1, 1].Add(pawn, 1, 1, PieceColor.White);
                        //Console.WriteLine(pieces[x, y].ToString());
                    }
                }
            }
            pawnSection = BoardPiece.bpawns;
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
