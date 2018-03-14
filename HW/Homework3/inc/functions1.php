<?php
    
    function play(){
        $question4 = $_GET['apple'];
        $question5 = $_GET['food'];
        $question6 = $_GET['hardworking'];
        $question8 = $_GET['challengeselect'];
        $question10 = $_GET['powerselect'];
        $question11 = $_GET['attributeselect'];
        
        getScore( $question4, $question5, 
        $question6, $question8, $question10, $question11);
    }
    function getScore($question4, $question5, 
        $question6, $question8, $question10, $question11){
        $score = 50; 
        
        
        switch($question4){
            case 'yes': $score+= 0;
                break;
            case 'no': $score+= 10;
                break;
        }
        switch($question5){
            case 'cheapfood': $score+= -10;
                break;
            case 'expensivefood': $score+= 0;
                break;
            case 'both': $score+= 10;
                break;
        }
        switch($question6){
            case 'yes': $score+= 0;
                break;
            case 'no': $score+= -10;
                break;
        }
        switch($question8){
            case 'bring': $score+= 0;
                break;
            case 'fine': $score+= 10;
                break;
            case 'leave': $score+= 20;
                break;
            case 'sorry': $score+= 30;
                break;
        }
        switch($question10){
            case 'invisible': $score+= 30;
                break;
            case 'shapeshift': $score+= 20;
                break;
            case 'fastest': $score+= 10;
                break;
            case 'teleport': $score+= -10;
                break;
            case 'nopowers': $score+= 0;
                break;
        }
        if($score <= 50){
            $score += 30;
        }
        switch($question11){
            case 'flexible': $score+= -50;
                break;
            case 'strong': $score+= -10;
                break;
            case 'different': $score+= -20;
                break;
            case 'normal': $score+= -30;
                break;
            case 'leader': $score+= -40;
                break;
        }
        
        $score = $score/10;
        if($score == 0){
            $score = 10; 
        }
        echo "<h2> Your score is: ";
        echo $score; 
        echo "</h2>";
        echo "<h2> Which means you are most compatible with ";
        echo "</h2>";
        
        echo '<div id=villain>';
        printVillain($score);
        echo "</div>";
        echo "<br />";
        echo "<br />";
    }
    function printVillain($score){
        
        switch($score){
            case 1:
                echo ' <img class="image" src="img/villain2.jpg" alt="Catwoman"/> ';
                echo "<h2>";
                echo "Catwoman"; 
                echo "</h2>";
                break;
            case 2:
                echo ' <img class="image" src="img/villain3.jpg" alt="Dead Shot"/> ';
                echo "<h2>";
                echo "Dead Shot"; 
                echo "</h2>";
                break;
            case 3:
                echo ' <img class="image" src="img/villain4.jpg" alt="Harley Quinn"/> ';
                echo "<h2>";
                echo "Harley Quinn"; 
                echo "</h2>";
                break;
            case 4:
                echo ' <img class="image" src="img/villain5.jpg" alt="Lady Shiva"/> ';
                echo "<h2>";
                echo "Lady Shiva"; 
                echo "</h2>";
                break;
            case 5:
                echo ' <img class="image"" src="img/villain6.jpg" alt="Nocturna"/> ';
                echo "<h2>";
                echo "Nocturna"; 
                echo "</h2>";
                break;
            case 6:
                echo ' <img class="image" src="img/villain7.jpg" alt="Nyssa Raatko"/> ';
                echo "<h2>";
                echo "Nyssa Raatko"; 
                echo "</h2>";
                break;
            case 7:
                echo ' <img class="image" src="img/villain8.jpg" alt="Penguin"/> ';
                echo "<h2>";
                echo "Penguin"; 
                echo "</h2>";
                break;
            case 8:
                echo ' <img class="image" src="img/villain9.jpg" alt="Poison Ivy"/> ';
                echo "<h2>";
                echo "Poison Ivy"; 
                echo "</h2>";
                break;
            case 9:
                echo ' <img class="image" src="img/villain10.jpg" alt="The Riddler"/> ';
                echo "<h2>";
                echo "The Riddler"; 
                echo "</h2>";
                break;
            case 10:
                echo ' <img class="image" src="img/villain11.jpg" alt="Scarecrow"/> ';
                echo "<h2>";
                echo "Scarecrow"; 
                echo "</h2>";
                break;
            case 11:
                echo ' <img class="image" src="img/villain12.jpg" alt="Two Face"/> ';
                echo "<h2>";
                echo "Two Face"; 
                echo "</h2>";
                break;
            case 12:
                echo ' <img class="image" src="img/villain1.jpg" /> ';
                echo "<h2>";
                echo "Bane"; 
                echo "</h2>";
                break;
        }
        
        // if($score <= 2){
        //     echo ' <img src="img/meme1.jpg" /> ';
        // }
        // else if ($score == 3||$score == 4)
        // {
        //     echo ' <img src="img/meme2.jpg" /> ';
        // }
        // else if ($score == 5||$score == 6)
        // {
        //     echo ' <img src="img/meme3.gif" /> ';
        // }
        // else if ($score == 7||$score == 8)
        // {
        //     echo ' <img src="img/meme4.jpg" /> ';
        // }
        // else if ($score == 9||$score == 10)
        // {
        //     echo ' <img src="img/meme5.jpg" /> ';
        // }
        // else if ($score > 10)
        // {
        //     echo ' <img src="img/meme6.jpg" /> ';
        // }
        // echo '<br /><br /><br />'; 
    }



?>