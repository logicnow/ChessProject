using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using SolarWinds.MSP.Chess;

namespace SolarWinds.MSP.Chess
{
    public class BoardPiece
    {
        public Pawn[,] bpawns;

        public BoardPiece()
        {
            bpawns = new Pawn[ChessBoard.MaxBoardWidth, ChessBoard.MaxBoardHeight];

           // InitializeBoard();  <<< stackoverflow babbbyyyy
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
                        bpawns[x, y] = new Pawn();
                        bpawns[x, y].Add(bpawns[x, y], x, y, PieceColor.White);

                        //Console.WriteLine(pieces[x, y].ToString());
                    }
                    if (x == ChessBoard.MaxBoardWidth - 1 || x == ChessBoard.MaxBoardWidth - 2)
                    {
                        bpawns[x, y] = new Pawn();
                        bpawns[x, y].Add(bpawns[x, y], x, y, PieceColor.Black);

                        //Console.WriteLine(pieces[x, y].ToString());

                    }
                }
            }
        }

        //
        // Todo: Potential Logic for couting paws
        public static bool ValidateTotalPawn()
        {
            int totalWhitePawns = 0, totalBlackPawns = 0;
            foreach (Pawn pawn in ChessBoard.pawnSection)
            {
                if (pawn != null)
                {
                    if (pawn.PieceColor == PieceColor.Black)
                    {
                        totalBlackPawns += 1;
                    }
                    if (pawn.PieceColor == PieceColor.White)
                    {
                        totalWhitePawns += 1;
                    }
                }
            }
            if (totalWhitePawns < 8 || totalBlackPawns < 8)
            {
                return true;
            }
            return false;
        }
    }
}
