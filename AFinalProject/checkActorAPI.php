<?php

    include '../dbConnection.php';
    
    $conn = getDatabaseConnection("casting");
    $actor_firstname = $_GET['actor_firstname'];
    $actor_lastname = $_GET['actor_lastname'];
    
    $sql = "SELECT * FROM actor WHERE `actor_lastname` = :last";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute( array(":last"=>$actor_lastname));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($record);

?>