<?php

    function play(){
        //$_SESSION["rand"] = rand(1,100);
        //print_r($_SESSION);
        
        //$randomNum = rand(1,100);
        //echo $randomNum; 
    
        $number = rand(0,99);
        $_SESSION['number'] = $number;
    
        if(isset($_SESSION['number']))
        {
            
        //     print_r($_SESSION);
        //     //$_SESSION['p'] = 0;
        //     //header('Location: index.php');
        // }
        // else
        // {
            print_r($_SESSION);
            echo "<form>";          //method='post'
            echo "Guess: "; 
            echo "<input id='num' class='num' type='text' value='' name='number'/> ";
            echo "<input id='button' type='submit' value='Guess' name='' />";
            echo "</form>";
            
            echo "<form>";
            echo "<input id='button2' type='submit' value='Play Again' name='playagain'/> ";
            echo "<input id='button3' type='submit' value='Give Up' name='giveup'/>";
            echo "<form>";
            
            echo $_SESSION['number']; 
            
            
            if(isset($_POST['number']) && ( $_SESSION['p'] < 9))
            {
                if(!empty($_POST['number']))$_SESSION['p'] ++;
                if($_POST['number'] > $_SESSION['number'])
                {
                    echo "<div class='rew'>Number you have to guess is smaller <br />Your previosly entered number: ".$_POST['number']."<br />Count of tries: ".$_SESSION['p']."</div>";
                }
                elseif($_POST['number'] < $_SESSION['number'])
                {
                    echo "<div class='rew'>Number you have to guess is bigger <br />Your previosly entered number: ".$_POST['number']."<br />Count of tries:  ".$_SESSION['p']."</div>";
                }
                else
                {
                    ?>
                    <script>
                        var name_input = document.getElementById('num');
                        name_input.value= $_SESSION['number'];
                        var name_button = document.getElementById('button');
                        name_button.value = 'Play Again';
                    </script>
                    <?php
                    unset($_SESSION['number']);
                    ?>
                    <?php
                }
            }
            elseif(isset($_POST['number']) && ( $_SESSION['p'] == 9))
            {
                $_SESSION['p'] ++;
                ?>
                <script>
                    var name_input = document.getElementById('num');
                    name_input.value= $_SESSION['number'];
                    var name_button = document.getElementById('button');
                    name_button.value = 'Play Again';
                </script>
                <?php
                unset($_SESSION['number']);
                unset($_SESSION['p']);
            }
        }
    }



?>