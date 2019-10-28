using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SolarWinds.MSP.Chess.Interfaces
{
    public interface IChessBoardPiece
    {
        int XCoordinate { get; set; }
        int YCoordinate { get; set; }
        PieceColor PieceColor { get; set; }
        IChessBoard ChessBoard { get; set; }
        bool IsLegalMove(MovementType movementType, int newX, int newY);
        IEnumerable<ChessBoardPlace> GetAllPossibleMoves();
        IEnumerable<ChessBoardPlace> GetCapturingMoves();
        IEnumerable<ChessBoardPlace> GetFreeMoves();
    }
}
