using SolarWinds.MSP.Chess.Interfaces;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SolarWinds.MSP.Chess.ChessPieces
{
    public static class ChessPieceFactory
    {
        public static IChessBoardPiece Create(ChessBoardPieceType @type, PieceColor color)
        {
            switch (@type)
            {
                case ChessBoardPieceType.Pawn:
                    return new Pawn(color);
                // ... Add here the rest of the possible chess pieces 
                default:
                    return null;
            }
        }
    }
}
