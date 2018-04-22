
//  VARIABLES
    var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                    'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                    'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    var words = [{ word: "banana", hint: "It's yellow" }, 
                 { word: "elephant", hint: "It has a trunk" }, 
                 { word: "ketchup", hint: "It's red" }];
    var selectedWord = "";
    var selectedHint = "";
    var board = [];
    var remainingGuesses = 6;


//  LISTENERS
        //  BEGINS THE GAME
    window.onload = startGame();
        //  CHECK THE LETTERS
    $("#letters").on("click", ".letter", function(){
    checkLetter($(this).attr("id"));
    disableButton($(this));
    
});
        //  RELOAD PAGE
    $(".replayBtn").on("click", function() {
    location.reload();
});
        //  GAME HINT
    $("#hint").on("click", function(){
        $("#hint").hide();
        $("#word").append("<br />");
        $("#word").append("<span class='hints'>Hint: " + selectedHint + "</span>")
    
        remainingGuesses -= 1;
        updateMan();
        if (remainingGuesses <= 0) {
            endGame(false);
        }
    });


//  FUNCTIONS
        //  STARTS THE GAME
    function startGame() {
        pickWord();
        createLetters();
        initBoard();
        updateBoard();
        var pGuessed = document.querySelector('#prevGuesses');
        pGuessed.innerHTML = 'Previous Guesses: ';

    }
        //  SELECTS WORD/HINT FROM ARRAY
    function pickWord() {
        let randInt = Math.floor(Math.random() * words.length);
        selectedWord = words[randInt].word.toUpperCase();
        selectedHint = words[randInt].hint;
        
        $("#hint").append("<button class='btn btn-success letter'>HINT</button>");
    }
        //  CREATES LETTERS
    function createLetters() {
        for (var letter of alphabet) {
        let letterInput = '"' + letter + '"';
            $("#letters").append("<button class='btn btn-success letter' id='" + letter + "'>" + letter + "</button>");
        }
    }
        //  FILLS BOARD WITH "_"
    function initBoard() {
        for (var letter in selectedWord) {
            board.push("_");
        }
    }
        //  UPDATES BOARD
    function updateBoard() {
        $("#word").empty();
        for (var i=0; i < board.length; i++) {
            $("#word").append(board[i] + " ");
        }
    }
        //  UPDATES WORD 
    function updateWord(positions, letter) {
        for (var pos of positions) {
            board[pos] = letter;
        }
        updateBoard(board);
            //  CHECKS FOR WINNING GUESS
        if (!board.includes('_')) {
            endGame(true);
        }
    }
        //  CHECKS FOR LETTER
    function checkLetter(letter) {
        var positions = new Array();
            // PUTS LETTERS IN ARRAY
        for (var i = 0; i < selectedWord.length; i++) {
            if (letter == selectedWord[i]) {
                positions.push(i);
            }
        }
            //  UPDATES GAME STATE
        if (positions.length > 0) {
            updateWord(positions, letter);
        } else {
            remainingGuesses -= 1;
            updateMan();
            if (remainingGuesses <= 0) {
                endGame(false);
            }
        }
        guessed(letter);
    }
        //  UPDATES IMAGE
    function updateMan() {
        $("#hangImg").attr("src", "img/stick_" + (6 - remainingGuesses) + ".png");
    }
        //  ENDS GAME
    function endGame(win) {
        $("#letters").hide();
        $("#hint").hide();
        if (win) {
            $('#won').show();
        } else {
            $('#lost').show();
        }
    }
        //  DISABLES BUTTON
    function disableButton(btn) {
        btn.prop("disabled",true);
        btn.attr("class", "btn btn-danger")
    }
        //  DISPLAYS GUESSED LETTERS
    function guessed(letter){
        var guessed = document.querySelector('#guessed');
        guessed.innerHTML += letter + '  ';
    }