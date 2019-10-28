using System;
using System.Collections.Generic;

namespace SolarWinds.MSP.Chess
{
    public class Pawn: ChessBoardPieceBase
    {
        public Pawn(PieceColor color) : base(color)
        {
        }

        private int PawnMoveDirection => (this.PieceColor == PieceColor.White)?1:-1;

        public void Move(MovementType movementType, int newX, int newY)
        {
            if (!IsLegalMove(movementType, newX, newY))
                return;

            ChessBoard.MovePiece(XCoordinate, YCoordinate, newX, newY);
        }

        public override bool IsLegalMove(MovementType movementType, int newX, int newY)
        {
            // we need to know the board configuration first.
            if ((ChessBoard == null) || (!ChessBoard.IsLegalBoardPosition(newX, newY)))
                return false;

            // Capture or move? This is the question! :)
            // Capture is not yet considered for the task, but still, we leave here an open door for future impleemntations
            // Move   : X remains the same and Y increments for White, decrements for Black
            // Capture: X varies by 1 and Y increments for White, decrements for Black, only if target pos is occupied by opponent piece
            return 
                (newY == YCoordinate + PawnMoveDirection) && (
                (newX == XCoordinate)                           // Move
                || ((movementType == MovementType.Capture)      // Capture
                    && (Math.Abs(newX - XCoordinate) == 1) 
                    && ((ChessBoard.GetPieceAtPosition(newX, newY) ?? this).PieceColor != this.PieceColor)
                   )
                );
        }

        public override IEnumerable<ChessBoardPlace> GetAllPossibleMoves()
        {
            // will be implemented when necessary
            throw new NotImplementedException();
        }

        public override IEnumerable<ChessBoardPlace> GetCapturingMoves()
        {
            // will be implemented when necessary
            throw new NotImplementedException();
        }

        public override IEnumerable<ChessBoardPlace> GetFreeMoves()
        {
            // will be implemented when necessary
            throw new NotImplementedException();
        }
    }
}
