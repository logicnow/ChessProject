using SolarWinds.MSP.Chess.ChessBoards;
using SolarWinds.MSP.Chess.Interfaces;
using System;

namespace SolarWinds.MSP.Chess
{
    public class ChessBoardPlace
    {
        public int XCoordinate { get; set; }
        public int YCoordinate { get; set; }
        public bool Allowed { get; set; }
        public PlaceColor Color => (XCoordinate+YCoordinate)%2==0? PlaceColor.White: PlaceColor.Black;

        public ChessBoardPlace()
        {
            // by default set this position as allowed
            Allowed = true;
        }

        public ChessBoardPlace(int x, int y): this()
        {
            XCoordinate = x;
            YCoordinate = y;
        }
        public IChessBoardPiece Piece { get; set; }
    }
}