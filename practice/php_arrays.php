<?php

    $cards = array("ace", "one", 2);

    //echo $cards[0]; 
    
    $cards[] = "jack";            // ADD NEW ELEMENT AT THE END OF THE ARRAY
    $cards[2] = "ten";            // ADD NEW ELEMENT AT INDEX 2
    array_push($cards, "queen"); 
    
    //print_r($cards);    // FOR DEBUGGING PURPOSES. 
    
    print_r($cards);
    echo "<hr>";
    $lastCard = array_pop($cards); //retrieves and REMOVE the last item in the array
    displayCard($lastCard);
    echo "<hr>";
    print_r($cards);
 
    unset($cards[1]); //removes element from array
    echo "<hr>";
    print_r($cards);
     
    $cards = array_values($cards); // REINDEXES ARRAY
    echo "<hr>"; 
    print_r($cards); 
    
    shuffle($cards);
    echo "<hr>";
    print_r($cards);
    
    $randomIndex = rand(0, count($cards)-1); 
    echo "<hr>";
    displayCard($cards[$randomIndex]);
    
    $randomIndex = array_rand($cards); 
    displayCard($cards[$randomIndex]);
    
    
    //displaysCard($cards[0]);
    function displayCard($card){
        //global $cards;  //  TO USE VARIABLE OUTSIDE OF THE FUNCTION
        echo "<img src='img/cards/clubs/$card.png' />"; 
    }
    
    
    
    
    
    /*
    displayCard();
    function displayCard(){
        global $cards;  //  TO USE VARIABLE OUTSIDE OF THE FUNCTION
        echo "<img src='img/cards/clubs/$cards[0].png' />"; 
    }*/
?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>