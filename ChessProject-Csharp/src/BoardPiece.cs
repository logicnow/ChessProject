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
        public static Pawn[,] bpawns;

        public BoardPiece()
        {
            bpawns = new Pawn[ChessBoard.MaxBoardWidth, ChessBoard.MaxBoardHeight];

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
