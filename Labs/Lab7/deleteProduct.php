<?php

    include '../../dbConnection.php';
    $connection = getDatabaseConnection("heroku_43c1456b693fb28");
    
    $sql = "DELETE FROM om_product WHERE productId =  " . $_GET['productId'];
    $statement = $connection->prepare($sql);
    $statement->execute();
 
    header("Location: admin.php");

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
    </body>
</html>