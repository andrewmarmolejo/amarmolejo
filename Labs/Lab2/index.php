<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
        <style>
            @import url(css/styles.css);
        </style>
    </head>
    <body>
        <main id="main">
            <?php
                include 'inc/functions.php';    // INCLUDES THE FUNCTION.PHP
                play();                         // FUNCTION TO PLAY
            ?>
            <form>
                <input type="submit" value="Spin!" />
            </form>
        </main>
        
        <div id="verified">
           <?php
                echo "<img id='verified' src='img/ver.png' alt='badge' />";
           ?>
        </div>
    </body>
</html>