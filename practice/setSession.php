<?php
session_start();    //STARTS OR RESUMES A SESSION

$_session['course'] = "CST336 Internet Programming"; 


?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <?= $_SESSION['course'] ?>
    </body>
</html>