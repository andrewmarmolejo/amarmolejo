<?php

// SELECT COUNT(userId) FROM `purchase` p
// INNER JOIN `user` u 
// WHERE p.user_id = u.userId AND 
// purchaseDate LIKE "%02"


// SELECT productName FROM 
// `product` pd INNER JOIN `purchase` p
// INNER JOIN `user` u ON
// pd.productId = p.productId AND 
// p.user_id = u.userId
// WHERE email LIKE "%aol%"


// SELECT productName FROM 
// `product` NATURAL JOIN `purchase` p
// INNER JOIN `user` u ON 
// p.user_id = u.userId
// WHERE email LIKE "%aol%"



// SELECT sex, SUM(quantity) 
// from user u INNER JOIN 
// purchase p ON u.userId = 
// p.user_id GROUP BY sex

// SELECT DISTINCT catName FROM 
// `purchase` NATURAL JOIN `product`
// NATURAL JOIN `category`
// WHERE purchaseDate >= "2018-01-02"
// and purchaseDate <= "2018-28-02"
// ?>


<?php

 $sql1 = "SELECT COUNT(1) totalPurchases
            FROM om_purchase p
            INNER JOIN om_user u
            on p.user_id = u.userId
            WHERE purchaseDate >= \"2018-02-01\" AND purchaseDate <= \"2018-02-29\"";
            
 $sql2 = "SELECT productName
            FROM om_user u
            INNER JOIN om_purchase p
            on u.userId = p.user_id
            NATURAL JOIN om_product
            WHERE email LIKE \"%@aol.com\" ";
            
 $sql3 = "SELECT SUM(quantity), sex
            FROM om_user u
            INNER JOIN om_purchase p
            on u.userId = p.user_id
            GROUP BY sex";

 $sql4 = "SELECT DISTINCT(catName)
            FROM om_purchase p
            INNER JOIN om_user u
            on p.user_id = u.userId
            NATURAL JOIN om_product 
            NATURAL JOIN om_category cat
            WHERE purchaseDate >= \"2018-02-01\" AND purchaseDate <= \"2018-02-29\"";
            
 $host = "localhost"; 
 $dbname = "ottermart";
 $username = "root"; 
 $password = "";
 
 $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
 $stmt = $dbConn -> prepare($sql1); 
 $stmt -> execute(); 
 $records = $stmt -> fetch();   //  FETCH WHEN ONLY EXPECTING ONE RECORD. 
 echo "Total Purchases in February: " . $records['totalPurchases']; 
 
 $stmt = $dbConn -> prepare($sql2); 
 $stmt -> execute(); 
 $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);    //  FETCHALL WHEN ONLY EXPECTING MANY RECORD. 
 
//  print_r($records); 
 
 echo "<br /><br />Products bought by users with an AOL account:<br />"; 
 
 foreach ($records as $record){
     
     echo $record['productName'] . "<br />"; 
 }
 
 
 $stmt = $dbConn -> prepare($sql3); 
 $stmt -> execute(); 
 $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
 
 echo "<br /><br />Males and Females, and sum: "; 
 
 print_r($records);
 
 
 
 
 ?>
 
 
