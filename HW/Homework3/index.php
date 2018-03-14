<?php

    $backgroundImage = "img/bg3.jpg";
    
    if(!empty($_GET['name']) && !empty($_GET['apple']) && 
    !empty($_GET['food']) && !empty($_GET['hardworking']) && 
    !empty($_GET['challengeselect']) && !empty($_GET['powerselect']) && 
    !empty($_GET['attributeselect'])){ 
        $fName = $_GET['name'];
        echo "<br />";
        echo "<div id='message2'>";
        echo "<h1>" . $fName . ", your results are in!</h1>";
        echo "</div>";
        
        include 'inc/functions1.php';
        play();

    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>  </title>
        <style>
            @import url("css/styles0.css");
            body {
                background-image: url(<?=$backgroundImage?>);
                background-repeat:no-repeat;
                background-position:left center;
                background-attachment: fixed;
            }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
        <div id="main">
            <?php
                if (!isset($_GET['name'])) {
                    echo "<br />";
                    echo "<div id='welcomeMessage'>";
                    echo "<h1> What Batman Villain Are You Most Compatible With? </h1>";
                    echo "<h3> Fill out the survey below. Begin with your name: </h3>";
                    echo "</div>";
                    // echo "<br />";
            }  
            ?>
        <form method="GET">
            <?php
                if(isset($_GET['name']) && empty($_GET['name'])){
                    echo "<br />";
                    echo "<h4> Don't forget to enter your name.</h4>";
                }
            ?>
            <input id="name" size="20" type="text" name="name" placeholder="First Name" value="<?=$_GET['name']?>" />

            <br /><br />
            
            <?php
                if(isset($_GET['name']) && empty($_GET['apple'])){
                    echo "<br />";
                    echo "<h4> Forgot this one! </h4>";
                }
            ?>
            <fieldset>
                <legend>Do you believe in the saying, "An apple a day keeps the doctor away?"</legend>
                <input id="Yes" type="radio" name="apple" value="yes"    <?= ($_GET['apple']=="yes")?"checked":"" ?>>
                <label for="Yes">Yes</label><br>
                <input id="No" type="radio" name="apple" value="no"    <?= ($_GET['apple']=="no")?"checked":"" ?>>
                <label for="No">No</label><br>
            </fieldset>
            <br />
            <?php
                if(isset($_GET['name']) && empty($_GET['food'])){
                    echo "<br />";
                    echo "<h4> Forgot this one!</h4>";
                }
            ?>
            <fieldset>
                <legend>The food you eat is usually:</legend>
                <input id="cheap" type="radio" name="food" value="cheapfood"            <?= ($_GET['food']=="cheapfood")?"checked":"" ?>>
                <label for="cheap">Cheap</label><br>
                <input id="expensive" type="radio" name="food" value="expensivefood"    <?= ($_GET['food']=="expensivefood")?"checked":"" ?>>
                <label for="expensive">Expensive</label><br>
                <input id="both" type="radio" name="food" value="both"                  <?= ($_GET['food']=="both")?"checked":"" ?>>
                <label for="both">Both! I love food!</label><br>
            </fieldset>
            <br />
            <?php
                if(isset($_GET['name']) && empty($_GET['hardworking'])){
                    echo "<br />";
                    echo "<h4> Forgot this one!</h4>";
                }
            ?>
            <fieldset>
                <legend>Would you call yourself hard working?</legend>
                <input id="Yes" type="radio" name="hardworking" value="yes"    <?= ($_GET['hardworking']=="yes")?"checked":"" ?>>
                <label for="Yes">Yes</label><br>
                <input id="No" type="radio" name="hardworking" value="no"    <?= ($_GET['hardworking']=="no")?"checked":"" ?>>
                <label for="No">No</label><br>
            </fieldset>
            
            <br />
            <?php
                if(isset($_GET['name']) && empty($_GET['challengeselect'])){
                    echo "<br />";
                    echo "<h4> Forgot this one!</h4>";
                }
            ?>
            <fieldset>
            <legend><label for="challenge">Your friend challenges you to a game. What will your answer be?</label></legend>
            <br />
            <select id="challenge" name="challengeselect">
                <option value="">-----------------Select One-----------------</option> 
                <option value="bring"    <?=($_GET['challengeselect']=="bring")? " selected":""?>>"Bring it on!"</option>
                <option value="fine"     <?=($_GET['challengeselect']=="fine")? " selected":""?>>"Fine."</option>
                <option value="leave"    <?=($_GET['challengeselect']=="leave")? " selected":""?>>"Leave me alone!"</option>
                <option value="sorry"    <?=($_GET['challengeselect']=="sorry")? " selected":""?>>"Sorry, but I don't really feel like it."</option>
            </select>
            </fieldset>

            <br />
            <?php
                if(isset($_GET['name']) && empty($_GET['powerselect'])){
                    echo "<br />";
                    echo "<h4> Forgot this one!</h4>";
                }
            ?>
            <fieldset>
            <legend><label for="specialpower">If you had a special power, which power would you want to have?</label></legend>
            <br />
            <select id="specialpower" name="powerselect">
                <option value="">----------------------Select One----------------------</option> 
                <option value="invisible"   <?=($_GET['powerselect']=="invisible")? " selected":""?>>The power to be invisible</option>
                <option value="shapeshift"  <?=($_GET['powerselect']=="shapeshift")? " selected":""?>>The power to shapeshift</option>
                <option value="fastest"     <?=($_GET['powerselect']=="fastest")? " selected":""?>>The power to be the fastest thing on Earth</option>
                <option value="teleport"    <?=($_GET['powerselect']=="teleport")? " selected":""?>>The power to teleport</option>
                <option value="nopowers"    <?=($_GET['powerselect']=="nopowers")? " selected":""?>>I don't need special powers</option>n>
            </select>
            </fieldset>
            <br />
            <?php
                if(isset($_GET['name']) && empty($_GET['attributeselect'])){
                    echo "<br />";
                    echo "<h4> Forgot this one!</h4>";
                }
            ?>
            <fieldset>
            <legend><label for="attribute">Which one of these is a good attribute about you?</label></legend>
            <br />
            <select id="attribute" name="attributeselect">
                 <option value="">-----------------Select One-----------------</option> 
                <option value="flexible"  <?=($_GET['attributeselect']=="flexible")? " selected":""?>>You are flexible</option>
                <option value="strong"    <?=($_GET['attributeselect']=="strong")? " selected":""?>>You are strong, mentally or physically</option>
                <option value="different" <?=($_GET['attributeselect']=="different")? " selected":""?>>You are different</option>
                <option value="normal"    <?=($_GET['attributeselect']=="normal")? " selected":""?>>You are normal</option>
                <option value="leader"    <?=($_GET['attributeselect']=="leader")? " selected":""?>>You are a leader</option>n>
            </select>
            </fieldset>
            <br /><br />
            <input type="submit" value="Submit!"/>
        </form>
        </div>
        <img id="villain1" src="img/villain1.jpg" alt="Bane"/>
        <img id="villain2" src="img/villain2.jpg" alt="Catwoman"/>
        <img id="villain3" src="img/villain3.jpg" alt="Dead Shot"/>
        <img id="villain4" src="img/villain4.jpg" alt="Harley Quinn"/>
        <img id="villain5" src="img/villain5.jpg" alt="Lady Shiva"/>
        <img id="villain6" src="img/villain6.jpg" alt="Nocturna"/>
        <img id="villain7" src="img/villain7.jpg" alt="Nyssa Raatko"/>
        <img id="villain8" src="img/villain8.jpg" alt="Penguin"/>
        <img id="villain9" src="img/villain9.jpg" alt="Poison Ivy"/>
        <img id="villain10" src="img/villain10.jpg" alt="The Riddler"/>
        <img id="villain11" src="img/villain11.jpg" alt="Scarecrow"/>
        <img id="villain12" src="img/villain12.jpg" alt="Two Face"/>
        <footer>
            <hr>CST 336. 2018. Marmolejo. Homework #3.<br />
            <strong>Disclaimer: </strong>
            The information in this webpage is fictitous. <br />
            It is used for academic purposes only.
            <br/><img src="img/logo.png" alt="CSUMB Logo"/>
        </footer>
    </body>
</html>