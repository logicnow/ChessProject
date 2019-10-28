using SolarWinds.MSP.Chess.Interfaces;
using System.Linq;

namespace SolarWinds.MSP.Chess
{
    public abstract class ChessBoardBase : IChessBoard
    {
        public static readonly int MaxBoardWidth = 7;
        public static readonly int MaxBoardHeight = 7;

        protected ChessBoardPlace[,] places;

        public ChessBoardPlace GetPlace(int x, int y)
        {
            return places[x, y];
        }

        public abstract bool IsLegalBoardPosition(int xCoordinate, int yCoordinate);

        public IChessBoardPiece GetPieceAtPosition(int xCoordinate, int yCoordinate)
        {
            // Check if the position is in range, then return the piece if any
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return null;

            return places[xCoordinate, yCoordinate].Piece;
        }

        public bool MovePiece(int xCoordinate, int yCoordinate, int newX, int newY)
        {
            // check with the board if the new position is valid
            if (!IsLegalBoardPosition(newX, newY))
                return false;

            IChessBoardPiece piece = places[xCoordinate, yCoordinate].Piece;
            var result = Add(piece, newX, newY, piece.PieceColor);

            // unassign the old position for this piece
            places[xCoordinate, yCoordinate].Piece = null;

            return result;
        }

        public bool Add(IChessBoardPiece piece, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            // chck if play board is ok with this new position
            if (!IsLegalBoardPosition(xCoordinate, yCoordinate))
                return false;

            // is the position already occupied?
            if (places[xCoordinate, yCoordinate].Allowed
                && places[xCoordinate, yCoordinate].Piece != null)
                return false;

            // assign the new chess piece to the desired position
            places[xCoordinate, yCoordinate].Piece = piece;

            // link the piece to the chessboard and position
            piece.ChessBoard = this;
            piece.XCoordinate = xCoordinate;
            piece.YCoordinate = yCoordinate;

            return true;

            // should we check if we need to unassign the old position from the board?
        }

    }
}