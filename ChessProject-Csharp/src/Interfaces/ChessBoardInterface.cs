using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace SolarWinds.MSP.Chess.Interfaces
{
    public interface IChessBoard
    {
        ChessBoardPlace GetPlace(int x, int y);
        bool Add(IChessBoardPiece piece, int xCoordinate, int yCoordinate, PieceColor pieceColor);
        bool MovePiece(int oldX, int oldY, int newX, int newY);
        bool IsLegalBoardPosition(int xCoordinate, int yCoordinate);
        IChessBoardPiece GetPieceAtPosition(int xCoordinate, int yCoordinate);
    }
}
