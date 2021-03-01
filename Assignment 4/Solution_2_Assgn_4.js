//stores status of the game
const statusDisplay = document.querySelector(".game_status");

let gameActive = true;
let currentPlayer = "X";
//game state will track the status of the cells
let gameState = ["", "", "", "", "", "", "", "", ""];

//the status of the game and the player's turn will change dynamically,
// so we create the messages as functions
const winningMessage = () => `Player ${currentPlayer} has won the game!`;
const drawMessage = () => `Game ended in a draw!`;
const currentPlayerTurn = () => `It's ${currentPlayer}'s turn.`;

statusDisplay.innerHTML = currentPlayerTurn();  

//function to check if a clicked cell has already been clicked and if not then handle the required events
function cellClick(clickedCellEvent){
	//store the cell(target) on which the click event(cellClickEvent) occured.
	const clickedCell = clickedCellEvent.target;
	//get the data-cell-index value for the clicked cell
	const clickedCellIndex = parseInt(clickedCell.getAttribute('data-cell-index'));

	//if the cell has already been clicked or if the game is inactive then return
	if(gameState[clickedCellIndex] !== "" || !gameActive)
		return;

	//otherwise everything is fine so handle the cell's updation and game's status validation
	cellPlayed(clickedCell, clickedCellIndex);
	resultValidation();
}

//function to update cell's state in gameState array and update the cell's content 
function cellPlayed(clickedCell, clickedCellIndex){
	gameState[clickedCellIndex] = currentPlayer;
	clickedCell.innerHTML = currentPlayer;

	document.querySelectorAll('.cell')[clickedCellIndex].style.color = currentPlayer === 'X' ? "blue" : "red";
}

	const winningConditions = [
		[0, 1, 2],
		[3, 4, 5],
		[6, 7, 8],
		[0, 3, 6],
		[1, 4, 7],
		[2, 5, 8],
		[0, 4, 8],
		[2, 4, 6],
	];

function resultValidation(){
	let roundWon = false;
	for(let i = 0; i <= 7; i++){
		//store i-th win condition 
		const winCondition = winningConditions[i];
		//store cell numbers for i-th win conditiion in a, b, c
		let a = gameState[winCondition[0]];
		let b = gameState[winCondition[1]];
		let c = gameState[winCondition[2]];
		//if even 1 cell is empty out of three means, this condition is false so continue to check other conditions
		if(a === "" || b === "" || c === "" )
			continue;
		//if all three cells are occupied by same player, then game won
		if(a === b && b === c){
			roundWon = true;
			break;
		}
	}
	//if round is won by current player then decalre player as victorious and set game as inactive
	if(roundWon){
		statusDisplay.innerHTML = winningMessage();
		gameActive = false;
		return;
	}

	//handle the game draw condition
	//if gameState has no empty string, i.e every cell has been filled
	let roundDraw = !gameState.includes("");
	if(roundDraw){
		statusDisplay.innerHTML = drawMessage();
		gameActive = false;
		return;
	}

	//in case no player has yet won and game is also not draw, then continue by changing player
	playerChange();
}

function playerChange(){
	currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
	statusDisplay.innerHTML = currentPlayerTurn();
}

function restartGame(){
	//reset all values
	gameActive = true;
	currentPlayer = "X";
	gameState = ["", "", "", "", "", "", "", "", ""];
	statusDisplay.innerHTML = currentPlayerTurn();
	document.querySelectorAll('.cell').forEach(cell => cell.innerHTML = "");
}

//setting the event listener's for each cell, for when it is clicked
document.querySelectorAll(".cell").forEach(cell => cell.addEventListener('click', cellClick));
document.querySelector(".game_restart").addEventListener('click', restartGame);	
