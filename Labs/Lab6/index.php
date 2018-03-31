<?php

    include '../../dbConnection.php'; 
    $conn = getDatabaseConnection("ottermart");

    function displayCategories(){
        global $conn; 
        $sql = "SELECT catId, catName FROM `om_category` ORDER BY catName";
        $stmt = $conn->prepare($sql); 
        $stmt -> execute(); 
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
        
        // print_r($records); 
        foreach($records as $record){
            echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option>"; 
        }
    }
    function displaySearchResults(){
        global $conn; 
        if (isset($_GET['searchForm'])){    //  CHECKS WHETHER THE USER HAS SUBMITTED THE FORM
            echo "<h3>"; 
            echo "Products Found"; 
            
                //  FOLLOWING SQL WORKS, BUT DOES NOT PREVENT SQL INJECTION 
                //  $sql = "SELECT * FROM om_product WHERE 1 AND productName LIKE '%".$_GET['product']."%'"; 
            
                //  FOLLOWING SQL WORKS, AND PREVENTS SQL INJECTION
            $namedParameters = array(); 
            $sql = "SELECT * FROM om_product WHERE 1";
            
            if(!empty($_GET['product'])){
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%" . $_GET['product'] . "%"; 
                
                echo ", for product \"" . $_GET['product'] . "\""; 
            }
            
            if(!empty($_GET['category'])){
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category']; 
                
                $cat = $_GET['category']; 
                
                switch($cat){
                    case 1:
                        echo ", in category \"Electronics\""; 
                        break;
                    case 2:
                        echo ", in category \"Video Games\""; 
                        break;
                    case 3:
                        echo ", in category \"Sports\""; 
                        break;
                    case 4:
                        echo ", in category \"Computers\""; 
                        break;
                    case 5:
                        echo ", in category \"Books\""; 
                        break;
                    case 6:
                        echo ", in category \"Toys\""; 
                        break;
                    case 7:
                        echo ", in category \"Movies\""; 
                        break;
                }
            }
            
            if(!empty($_GET['priceFrom'])){
                $sql .= " AND price >= :priceFrom";
                $namedParameters[":priceFrom"] = $_GET['priceFrom']; 
                
                echo ", from price $" . $_GET['priceFrom'];
            }
            
            if (!empty($_GET['priceTo'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND price <= :priceTo";
                 $namedParameters[":priceTo"] =  $_GET['priceTo'];
                 
                  echo ", to price $" . $_GET['priceTo'];
             }
             
             if(isset($_GET['orderBy'])){
                 
                 if($_GET['orderBy'] == "price"){
                     $sql .= " ORDER BY price";
                     
                     echo ", order by price";
                 }
                 else{
                     $sql .= " ORDER BY productName"; 
                     
                     echo ", order by name";
                 }
                 
             }
            
            echo ": "; 
            echo "</h3>";
            
            $stmt = $conn->prepare($sql); 
            $stmt -> execute($namedParameters); 
            $records = $stmt -> fetchAll(PDO::FETCH_ASSOC); 
            
            foreach($records as $record){
                
            echo "<a href=\"purchaseHistory.php?productId=" . $record["productId"] . "\"> History</a>";    
            echo " " . $record["productName"] . ": " . $record["productDescription"] . " $" . $record["price"] . "<br /><br />"; 
        }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <link href="css/styles34.css" rel="stylesheet" types="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
    <div id="main">
        <h1> OtterMart <br/> Product Search </h1>
        
        <form>
            Product: <input type="text" name="product" value="<?=$_GET['product']?>"/><br /><br />
            Category:    
                <select name="category">
                    <option value=""> Select One </option>
                    <?= displayCategories() ?>
                </select>
            <br /><br />
            Price:  From <input type="text" name="priceFrom" size="7" value="<?=$_GET['priceFrom']?>" />
                    To   <input type="text" name="priceTo" size="7"   value="<?=$_GET['priceTo']?>" />
            <br /><br />
            Order results by:<br />
            <input type="radio" name="orderBy" value="price" <?= ($_GET['orderBy']=="price")?"checked":""?> /> Price<br />
            <input type="radio" name="orderBy" value="name"  <?= ($_GET['orderBy']=="name")?"checked":""?> /> Name<br />
            <br />
            <input type="submit" value="Search" name="searchForm" />
        </form>
    </div>    
        <br />
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>