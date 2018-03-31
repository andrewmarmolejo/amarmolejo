<?php
    $productId = $_GET['productId'];
 ?>
<?php
    
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("ottermart");

    $productId = $_GET['productId'];

    $sql = "SELECT * FROM `om_product`
            NATURAL JOIN om_purchase 
            WHERE productId = :pId";    
    
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //print_r($records);
    
    echo "<div id='main2'>";
    if(empty($records)){
        echo "<h2>";
        echo "No purchase history";
        echo "</h2>";
    }
    else{
        echo "<h2>Product Purchase History & Image</h2>";
        echo "<h3>";
        echo $records[0]['productName'] . "<br>";
        echo "</h3>";
        echo "<img src='" . $records[0]['productImage'] . "' width='200' /><br/>";
        foreach ($records as $record) {
            echo "<h4>";
            echo "Purchase Date: " . $record["purchaseDate"] . "<br />";
            echo "Unit Price: " . $record["unitPrice"] . "<br />";
            echo "Quantity: " . $record["quantity"] . "<br />";
            echo "</h4>";
        }
    }
    echo "</div>"; 
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title> Product Purchase History & Image </title>
        <link href="css/styles34.css" rel="stylesheet" types="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>

    </body>
</html>