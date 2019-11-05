using System;

namespace SolarWinds.MSP.Chess
{
    public class Pawn : BoardPiece
    {
       // private ChessBoard chessboard;
        private int xCoordinate;
        private int yCoordinate;
        private PieceColor pieceColor;

      //  public ChessBoard ChessBoard
     //   {
     //       get { return chessboard; }
     //       set { chessboard = value; }
     //   }

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

       // public void PawnColor(PieceColor pieceColor)
       // {
       //     this.pieceColor = pieceColor;
       // }

        public Pawn()
        {
            xCoordinate = 0;
            yCoordinate = 0;
            pieceColor = PieceColor.Black;
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
        }

        public void Add(Pawn pawn, int xCoordinate, int yCoordinate, PieceColor pieceColor)
        {
            if (BoardPiece.ValidateTotalPawn())
            {
            //    if (IsPositionUsed(pawn, ref xCoordinate, ref yCoordinate) == true)
            //    {
            pawn.XCoordinate = xCoordinate;
            pawn.YCoordinate = yCoordinate;
            pawn.PieceColor = pieceColor;
            //    }
            }
        }

        //
        // TODO: WOrk on logic, at the given time everything seems to be true.
        private bool IsPositionUsed(Pawn pawn, ref int newX , ref int newY)
        {
            if (ChessBoard.pawnSection[newX,newY] == null && ChessBoard.pawnSection[newX, newY].pieceColor == pawn.pieceColor) // not null or same color pawn
            {
                newX = -1;
                newY = -1;
                return false;
            }
            return true;
        }

        public bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            //
            // TODO: Check side move on xCoordinate
            //
            if (xCoordinate >= 0 && yCoordinate >= 0)
            {
                if (xCoordinate < ChessBoard.MaxBoardWidth && yCoordinate < ChessBoard.MaxBoardHeight)
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
