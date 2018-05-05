<?php

    session_start();
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("casting");
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    //  FOLLING SQL DOES NOT PREVENT SQL INJECTION
    $sql = "SELECT * FROM om_admin WHERE username = '$username' AND password = '$password'";
    
    //  FOLLOWING SQL PREVENTS SQL INJECTION BY AVOIDING USING SINGLE QUOTES   
    $sql = "SELECT * FROM om_admin WHERE username = :username AND password = :password";
            
    $np = array(); 
    $np[":username"] = $username; 
    $np[":password"] = $password; 
            
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //expecting one single record

    if (empty($record)) {
        echo "<h1> OtterMart - Admin Login </h1>";
        echo "<h3>Wrong username or password!</h3>";
        echo "<form method='POST' action='loginProcess.php'>";
            echo "Username: <input type='text' name='username'/> <br />";
            echo "Password: <input type='password' name='password'/> <br /><br />";
            echo "<input type='submit' name='submitForm' value='Login!' />";
        echo "</form>";
    } else {
            $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
            header("Location:admin.php");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Log In</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
        <style>
            
        </style>
    </head>
    <body>
    <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>