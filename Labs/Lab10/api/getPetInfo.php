<?php

    include '../../../dbConnection.php';
    
    $conn = getDatabaseConnection("heroku_43c1456b693fb28");
    $id = $_GET['id'];
    
    $sql = "SELECT *, YEAR(CURDATE()) - yob age FROM pets WHERE id = :id";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute( array(":id"=>$id));
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($record);

?>