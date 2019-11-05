using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Microsoft.VisualStudio.TestTools.UnitTesting;  

namespace SolarWinds.MSP.Chess
{
    [TestClass]
	public class PawnTest
	{
		private ChessBoard chessBoard;
		private Pawn pawn;

		[TestInitialize]
		public void SetUp()
		{
			chessBoard = new ChessBoard();
			pawn = new Pawn();
		}

		[TestMethod]
		public void ChessBoard_Add_Sets_XCoordinate()
		{
			pawn.Add(pawn, 6, 3, PieceColor.Black);
			Assert.AreEqual(pawn.XCoordinate, 6);
		}

		[TestMethod]
		public void ChessBoard_Add_Sets_YCoordinate()
		{
			pawn.Add(pawn, 6, 3, PieceColor.Black);
			Assert.AreEqual(pawn.YCoordinate, 3);
		}

		[TestMethod]
		public void Pawn_Move_IllegalCoordinates_Right_DoesNotMove()
		{
			pawn.Add(pawn, 6, 3, PieceColor.Black);
			pawn.Move(pawn, MovementType.Move, 7, 3);
            Assert.AreEqual(pawn.XCoordinate, 6);
            Assert.AreEqual(pawn.YCoordinate, 3);
		}

		[TestMethod]
		public void Pawn_Move_IllegalCoordinates_Left_DoesNotMove()
		{
			pawn.Add(pawn, 6, 3, PieceColor.Black);
			pawn.Move(pawn, MovementType.Move, 4, 3);
            Assert.AreEqual(pawn.XCoordinate, 6);
            Assert.AreEqual(pawn.YCoordinate, 3);
		}

		[TestMethod]
		public void Pawn_Move_LegalCoordinates_Forward_UpdatesCoordinates()
		{
			pawn.Add(pawn, 6, 3, PieceColor.Black);
			pawn.Move(pawn, MovementType.Move, 6, 2);
			Assert.AreEqual(pawn.XCoordinate, 6);
            Assert.AreEqual(pawn.YCoordinate, 2);
		}

	}
}
