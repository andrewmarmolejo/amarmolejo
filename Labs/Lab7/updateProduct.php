<?php
    include '../../dbConnection.php';
    $connection = getDatabaseConnection("heroku_43c1456b693fb28");
    
    function getCategories($catId) {
    global $connection;
    
    $sql = "SELECT catId, catName from om_category ORDER BY catName";
    
    $statement = $connection->prepare($sql);
    $statement->execute();
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo "<option  ";
        echo ($record["catId"] == $catId)? "selected": ""; 
        echo " value='".$record["catId"] ."'>". $record['catName'] ." </option>";
    }
}
    function getProductInfo(){
        global $connection;
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
    
        //echo $_GET["productId"];
        
        $statement = $connection->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    if (isset($_GET['updateProduct'])) {
        
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['description'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
                
        $statement = $connection->prepare($sql);
        $statement->execute($np);        

        
    }
    if(isset ($_GET['productId'])){
        $product = getProductInfo();
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Product </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
        <h1>Update Product</h1>
        <form method="POST" action="admin.php">    
            <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
        </form>
        <div id="main">
        <form>
            <input type="hidden" name="productId" value= "<?=$product['productId']?>"/>
            Product name: <input type="text" value = "<?=$product['productName']?>" name="productName"><br>
            Description: <br><textarea name="description" cols = 50 rows = 4><?=$product['productDescription']?></textarea><br>
            Price: <input type="text" name="price" value = "<?=$product['price']?>"><br>
            Category: <select name="catId">
                <option>Select One</option>
                <?php getCategories( $product['catId'] ); ?>
            </select> <br />
            Set Image Url: <input type = "text" name = "productImage" style="width: 370px;" value = "<?=$product['productImage']?>"><br>
        </form>
        </div>
        <form><br />    
            <input type="submit" name="updateProduct" value="Update Product">
        </form>
        <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>