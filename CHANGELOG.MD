# Changelog

## November 2019

### Changed
- Removed the Java and PHP projects

- Changed test to adder to Method changes.

- Pawn is now child class of BoardPiece, This will help implement other Pieces to the Board

- Changed Has_MaxBoardHeight_of_7 to 8 as Index starts from 0

- Removed Chessboard Variable from Pawn, seemed unessesary, however bac be used to tag a pawn against its board

- Added Pawn as a an attribute to Add thus we can get access to the pawn being added.

### Added
- Pawn::IsLegalBoardPosition() This should verify that the piece is indeed inside the board and obtains a valid possition when adding

- Pawn::Add() This shall validate input prior to adding the pawn to the board

- Pawn::Move() Allow the pawn to move inside board coordinates, these are validated prior to the move


- Pawn::ValidateTotalPawn() following should count how many pawns of same color in the array. this will allow us to limit the number of pawns in the board

Pawn::IsPositionUsed() this will check the pieces array with the new coordinates, if this contains a piece of same color it will consider the Position as Taken.

- ChessBoard::InitializeBoard() This will fill in the Board with 2 rows of white and black as per a game.

### TODO
- Implement ChessBoard::Initializer into Class BoardPiece, this will initialize the Pieces in the Board.

- Check side move on xCoordinate (x == x)

- Extend Logic: PAwn::IsPositionUsed() Work at the given time everything seems to be true. Debug seems to pass in new Pawn Everytime.

- Implement Pawn::ValidateTotalPawn() This should allow the count and limit of the pawn pieces

- Implement Enumerator for other Pieces (king, Queen, Tower...)

### Additional Comments
- An example consumser for the library was added, however later on removed as deeped unnesesary. 

- There are alot of public methods and have had to change some this way. From implementer poing this can become tricky on visibility.

- The Pawn is a chil of the BoardPiece, this will simplify when adding other pieces.