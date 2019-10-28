using SolarWinds.MSP.Chess.Interfaces;
using System;
using System.Linq;

namespace SolarWinds.MSP.Chess
{
    public class RectangularChessBoard: ChessBoardBase
    {
        public RectangularChessBoard ()
        {
            // The concept of "Place" has been introduced to be able to 
            // create custom boards, where some positions are unavailable
            // e.g. Round tables, triangle tables etc
            places = new ChessBoardPlace[MaxBoardWidth, MaxBoardHeight];
            for (int x = 0; x < MaxBoardWidth; x++)
                for (int y = 0; y < MaxBoardHeight; y++)
                    places[x, y] = new ChessBoardPlace(x, y);

            
        }

        public override bool IsLegalBoardPosition(int xCoordinate, int yCoordinate)
        {
            // Just for the sake of playing with Linq. Of course this is not the optimal way of checking it
            return
                Enumerable.Range(0, MaxBoardHeight).Contains(yCoordinate)
                && Enumerable.Range(0, MaxBoardWidth).Contains(xCoordinate)
                && (this.GetPlace(xCoordinate, yCoordinate).Allowed);
        }

    }
}
