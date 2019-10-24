using System;

namespace SolarWinds.MSP.Chess
{
    public class Pawn
    {
        private ChessBoard chessBoard;
        private int xCoordinate = -1;
        private int yCoordinate = -1;
        private PieceColor pieceColor;
        
        public ChessBoard ChessBoard
        {
            get { return chessBoard; }
            set { chessBoard = value; }
        }

        public int XCoordinate
        {
            get { return xCoordinate; }
            set { xCoordinate = value; }
        }
        
        public int YCoordinate
        {
            get { return yCoordinate; }
            set { yCoordinate = value; }
        }

        public PieceColor PieceColor
        {
            get { return pieceColor; }
            private set { pieceColor = value; }
        }

        public Pawn(PieceColor pieceColor)
        {
            this.pieceColor = pieceColor;
        }

        public void Move(MovementType movementType, int newX, int newY)
        {
            if (!IsMoveLegal(movementType, newX, newY))
                return;

            ChessBoard.MovePiece(XCoordinate, YCoordinate, newX, newY);
        }

        private bool IsMoveLegal(MovementType movementType, int newX, int newY)
        {
            if ((ChessBoard == null) || (!ChessBoard.IsLegalBoardPosition(newX, newY)))
                return false;

            bool bValidMove = false;
            switch (PieceColor)
            {
                case PieceColor.Black:
                    bValidMove = (newY == YCoordinate - 1) && (
                        (newX == XCoordinate)
                        || ((movementType == MovementType.Capture) && (Math.Abs(newX - XCoordinate) == 1) && (ChessBoard.GetPieceAtPosition(newX, newY)?.PieceColor != this.PieceColor))
                        );
                    break;
                case PieceColor.White:
                    bValidMove = (newY == YCoordinate + 1) && (
                        (newX == XCoordinate)
                        || ((movementType == MovementType.Capture) && (Math.Abs(newX - XCoordinate) == 1) && (ChessBoard.GetPieceAtPosition(newX, newY)?.PieceColor != this.PieceColor))
                        );
                    break;
            }

            return bValidMove;
        }

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
