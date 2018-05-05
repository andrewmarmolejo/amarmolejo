<?php

    include '../dbConnection.php';
    $connection = getDatabaseConnection("casting");
    
    $sql = "DELETE FROM actor WHERE actor_id =  " . $_GET['actor_id'];
    $statement = $connection->prepare($sql);
    $statement->execute();
 
    header("Location: database.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    </body>
</html>