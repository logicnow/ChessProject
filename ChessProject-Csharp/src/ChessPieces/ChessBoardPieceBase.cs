using System;
using System.Collections.Generic;
using SolarWinds.MSP.Chess.Interfaces;

namespace SolarWinds.MSP.Chess
{
    public abstract class ChessBoardPieceBase : IChessBoardPiece
    {
        public int XCoordinate { get; set; }
        public int YCoordinate { get; set; }
        public PieceColor PieceColor { get; set; }
        public IChessBoard ChessBoard { get; set; }

        public ChessBoardPieceBase()
        {
            XCoordinate = -1;
            YCoordinate = -1;
        }

        public ChessBoardPieceBase(PieceColor color): this()
        {
            PieceColor = color;
        }


        public abstract IEnumerable<ChessBoardPlace> GetAllPossibleMoves();

        public abstract IEnumerable<ChessBoardPlace> GetCapturingMoves();

        public abstract IEnumerable<ChessBoardPlace> GetFreeMoves();

        public abstract bool IsLegalMove(MovementType movementType, int newX, int newY);

        public override string ToString()
        {
            return CurrentPositionAsString();
        }

        protected string CurrentPositionAsString()
        {
            return string.Format("Current X: {1}{0}Current Y: {2}{0}Piece Color: {3}", Environment.NewLine, XCoordinate, YCoordinate, PieceColor);
        }
    }
}