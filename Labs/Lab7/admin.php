<?php

    session_start();
    include '../../dbConnection.php';
    $conn = getDatabaseConnection("heroku_43c1456b693fb28");
    
    if(!isset( $_SESSION['adminName'])){
        header("Location:index.php");
    }
    function displayAllProducts(){
        global $conn;
        $sql="SELECT * FROM om_product";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $records;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            form {
                display: inline;
            }
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
        <h1> Admin Main Page </h1>
        <h2> Welcome <?=$_SESSION['adminName']?>! </h2>
        <br />
        <form action="addProduct.php">
            <input type="submit" name="addproduct" value="Add Product"/>
        </form>
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        <br /> <br />
        <h2> Products: </h2> 
        <div id="main">
        <?php $records=displayAllProducts();
            foreach($records as $record) {
                //echo "[<a href='updateProduct.php?productId=".$record['productId']."'>Update</a>] ";
                echo "<form action='updateProduct.php'>";
                echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
                echo "<input type='submit' value='Update'> ";
                echo "</form>";
                
                //echo "[<a href='deleteProduct.php?productId=".$record['productId']."'>Delete</a>]";
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
                echo "<input type='submit' value='Remove'> ";
                echo "</form>";
                
                echo $record['productName'];
                echo '<br>';
            }
        ?>
        </div>
        <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>