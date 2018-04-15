<?php

    session_start();
    include "../../dbConnection.php";
    $conn = getDatabaseConnection("heroku_43c1456b693fb28");
    
    if(!isset( $_SESSION['adminName'])){
    header("Location:index.php");
    }
    function getCategories() {
        global $conn;
        $sql = "SELECT catId, catName from om_category ORDER BY catName";
    
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($records as $record) {
            echo "<option value='".$record["catId"] ."'>". $record['catName'] ." </option>";
        }
    }
    if (isset($_GET['submitProduct'])) {
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];
    
        $sql = "INSERT INTO om_product
                ( `productName`, `productDescription`, `productImage`, `price`, `catId`) 
                 VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
    
        $namedParameters = array();
        $namedParameters[':productName'] = $productName;
        $namedParameters[':productDescription'] = $productDescription;
        $namedParameters[':productImage'] = $productImage;
        $namedParameters[':price'] = $productPrice;
        $namedParameters[':catId'] = $catId;
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add a product </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
        <h1> Add a product</h1>
        <form method="POST" action="admin.php">    
            <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
        </form>
        <div id="main">
        <form><br />
            Product name: <input type="text" name="productName"><br>
            Description: <br><textarea name="description" cols = 50 rows = 4></textarea><br>
            Price: <input type="text" name="price"><br>
            Category: <select name="catId">
                <option value="">Select One</option>
                <?php getCategories(); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage"><br><br />
        </form>
        </div>
        <form><br />
            <input type="submit" name="submitProduct" value="Add Product"><br />
        </form>
        <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>