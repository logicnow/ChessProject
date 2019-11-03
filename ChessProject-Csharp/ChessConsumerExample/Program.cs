using System;
using System.Collections.Generic;
using System.Text;
using SolarWinds.MSP.Chess;

namespace ChessConsumerExample
{
    class Program
    {
        static void Main(string[] args)
        {
            ChessBoard ChessBoard = new ChessBoard();
            ChessBoard.PrintExampleBoard();
        }
    }
}
