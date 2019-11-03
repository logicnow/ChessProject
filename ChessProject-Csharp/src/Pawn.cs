using System;

namespace SolarWinds.MSP.Chess
{
    public class Pawn
    {
        private int xCoordinate;
        private int yCoordinate;
        private PieceColor pieceColor;

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
            set { pieceColor = value; }
        }

        public Pawn(PieceColor pieceColor)
        {
            this.pieceColor = pieceColor;
        }

        public void Move(Pawn pawn, MovementType movementType, int newX, int newY)
        {
            if (IsLegalBoardPosition(newX, newY))
            {
                if(movementType == MovementType.Move)
                {
                    pawn.xCoordinate = newX;
                    pawn.yCoordinate = newY;
                }
            }
            //
            // TODO: Implement movementType.Capture()

            //throw new NotImplementedException("Need to implement Pawn.Move()");
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;
            pawn.PieceColor = pieceColor; 

        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            //
            // TODO: Check side move on xCoordinate
            //
            if (xCoordinate < 0 && yCoordinate < 0)
            {
                if (xCoordinate > ChessBoard.MaxBoardWidth + 1 && yCoordinate > ChessBoard.MaxBoardHeight + 1)
                {
                    return true;
                }
            }
            return false;

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
