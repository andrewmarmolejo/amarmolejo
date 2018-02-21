<?php
        function play(){
            echo "<form>";
                echo "<input type='submit' value='Play!' />";
            echo "</form>";
            
            echo "<img id='grid' src='img/3x5grid.png' alt='grin' />";
            echo "<main id='main'>";
                echo "<br />";
                echo "<h2>Click \"Play\"!</h2>";
                echo "<h4> The victim and killer will land at random positions, each time.</h4>";
                echo "<h4>If the killer lands in the same square, the square next to, or the square diagnol to the victim, the victim dies.</h4>";
                echo "<hr>";
            echo "</main>";
            
            $theReel=rand(7,9);
            $theReel2=rand(1,15);
            
            displayCharacters($theReel, $theReel2);
            displayWin($theReel, $theReel2);
        }
        function displayCharacters($theReel, $theReel2){
    
            $randomValue1 = rand(0,1);
            $randomValue2 = rand(0,2);
            
            switch($randomValue1){
                case 0: $person = "Woman";
                    break;
                case 1: $person = "Man";
                    break;
            }
            echo "<img id='reel$theReel' src='img/$person.png' alt='$person victim' title= '$person Victim' />";
            
            switch($randomValue2){
                case 0: $killer = "MichaelMyers";
                    break;
                case 1: $killer = "Scream";
                    break;
                case 2: $killer = "JasonVoorhees";
                    break;
            }
            echo "<img id='reel$theReel2' src='img/$killer.png' alt='$killer' title='$killer' />";
        }
        function displayWin($theReel, $theReel2){
            echo "<div id='output'>";
                if($theReel == $theReel2){
                    echo "<h3> Victim Really Freaking Died! </h3>";
                    exit();
                }
            
                $gridPosition = array(0, -6, -5, -4, -1, 1, 4, 5, 6);
                $gridCheck = array(); 
                unset($gridPosition[0]);
                shuffle($gridPosition);
            
                for($i = 0; $i < count($gridPosition); $i++){
                    $gridCheck[$i] = $theReel + $gridPosition[$i]; 
                }
                for($i = 0; $i < count($gridCheck); $i++)
                {
                    if($gridCheck[$i] == $theReel2)
                    {
                        echo "<h3> Victim Died! </h3>";
                        exit();
                    }
                }
                echo "<h3> Victim Survived! </h3>";
            echo "</div>"; 
        }
?>