<?php 

    $conn = getDatabaseConnection("casting");
    if(isset($_GET['searchForm'])) {
        global $conn;

        $namedParameters = array();
            
        $sql = "SELECT * FROM actor WHERE 1";
            
            if (!empty($_GET['gender_id'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND gender_id LIKE :gender_id";
                 $namedParameters[":gender_id"] = $_GET['gender_id'];
            }
            if (!empty($_GET['genres'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND genre_id = :genre_id";
                 $namedParameters[":genre_id"] = $_GET['genres'];
            }
            if (!empty($_GET['agencies'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND agency_id = :agency_id";
                 $namedParameters[":agency_id"] =  $_GET['agencies'];
            } 
            if (!empty($_GET['age_from'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND actor_age >= :age_from";
                 $namedParameters[":age_from"] =  $_GET['age_from'];
             }
            if (!empty($_GET['age_to'])) { //checks whether user has typed something in the "Product" text box
                 $sql .=  " AND actor_age <= :age_to";
                 $namedParameters[":age_to"] =  $_GET['age_to'];
             }
            if (isset($_GET['orderBy'])) {
                
                if ($_GET['orderBy'] == "age_desc") {
                
                    $sql .= " ORDER BY actor_age DESC";
                
                } else if ($_GET['orderBy'] == "age_asc"){
                
                    $sql .= " ORDER BY actor_age";
                
                } else if($_GET['orderBy'] == "years_active"){   
                
                    $sql .= " ORDER BY years_active DESC";
                } else {
                    $sql .= " ORDER BY actor_lastname";
                }
            }
            else {
                    $sql .= " ORDER BY actor_lastname";
            }

        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    if (isset($_GET['submitProduct'])) {
        $actor_firstname = $_GET['actor_firstname'];
        $actor_lastname = $_GET['actor_lastname'];
        $actor_age = $_GET['actor_age'];
        $gender_id = $_GET['gender_id'];
        $actor_photo = $_GET['actor_photo'];
        $years_active = $_GET['years_active'];
        $known_for = $_GET['known_for'];
        
        $genre_id = $_GET['genre_id'];
        $agency_id = $_GET['agency_id'];
    
        $sql = "INSERT INTO actor
                ( `actor_firstname`, `actor_lastname`, `actor_age`, `gender_id`, `actor_photo`, `years_active`, `known_for`, `genre_id`, `agency_id`) 
                 VALUES ( :actor_firstname, :actor_lastname, :actor_age, :gender_id, :actor_photo, :years_active, :known_for, :genre_id, :agency_id)";
    
        $namedParameters = array();
        $namedParameters[':actor_firstname'] = $actor_firstname;
        $namedParameters[':actor_lastname'] = $actor_lastname;
        $namedParameters[':actor_age'] = $actor_age;
        $namedParameters[':gender_id'] = $gender_id;
        $namedParameters[':actor_photo'] = $actor_photo;
        $namedParameters[':years_active'] = $years_active;
        $namedParameters[':known_for'] = $known_for;
        $namedParameters[':genre_id'] = $genre_id;
        $namedParameters[':agency_id'] = $agency_id;
        
        $statement = $conn->prepare($sql);
        $statement->execute($namedParameters);
    }
    if (isset($_GET['updateProduct'])) {
        $sql = "UPDATE actor
                SET actor_firstname = :actor_firstname,
                    actor_lastname = :actor_lastname,
                    actor_age = :actor_age,
                    gender_id = :gender_id,
                    actor_photo = :actor_photo, 
                    years_active = :years_active, 
                    known_for = :known_for, 
                    genre_id = :genre_id, 
                    agency_id = :agency_id 
                WHERE actor_id = :actor_id";
                
        $np = array();
        $np[":actor_firstname"] = $_GET['actor_firstname'];
        $np[":actor_lastname"] = $_GET['actor_lastname'];
        $np[":actor_age"] = $_GET['actor_age'];
        $np[":gender_id"] = $_GET['gender_id'];
        $np[":actor_photo"] = $_GET['actor_photo'];
        $np[":years_active"] = $_GET['years_active'];
        $np[":known_for"] = $_GET['known_for'];
        
        $np[":genre_id"] = $_GET['genre_id'];
        $np[":agency_id"] = $_GET['agency_id'];
        $np[":actor_id"] = $_GET['actor_id'];
                
        $statement = $conn->prepare($sql);
        $statement->execute($np);        

        
    }
    
    
    
    function getProductInfo(){
        global $conn;
        $sql = "SELECT * FROM actor WHERE actor_id = " . $_GET['actor_id'];
        
        $statement = $conn->prepare($sql);
        $statement->execute();
        $record = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    function displayTheGenders($gender_id){
        global $conn;
        
        $sql = "SELECT gender_id, gender FROM `gender` ORDER BY gender_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option  ";
            echo ($record["gender_id"] == $gender_id)? "selected": ""; 
            echo " value='".$record["gender_id"] ."'>". $record['gender'] ." </option>";
        }
    }
    function displayTheGenres($genre_id){
        global $conn;
        
        $sql = "SELECT genre_id, genre_name FROM `genre` ORDER BY genre_name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option  ";
            echo ($record["genre_id"] == $genre_id)? "selected": ""; 
            echo " value='".$record["genre_id"] ."'>". $record['genre_name'] ." </option>";
        }
    }
    function getTheAgency($agency_id){
        global $conn;
        
        $sql = "SELECT agency_id, agency_name FROM `agency` ORDER BY agency_name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option  ";
            echo ($record["agency_id"] == $agency_id)? "selected": ""; 
            echo " value='".$record["agency_id"] ."'>". $record['agency_name'] ." </option>";
        }
    }
    function displayGenres(){
        global $conn;
        
        $sql = "SELECT genre_id, genre_name FROM `genre` ORDER BY genre_name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='".$record["genre_id"]."' >" . $record["genre_name"] . "</option>";
        }
    }
    function displayAgencies(){
        global $conn;
        
        $sql = "SELECT agency_id, agency_name FROM `agency` ORDER BY agency_name";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='".$record["agency_id"]."' >" . $record["agency_name"] . "</option>";
        }
    }
    function displayGenders(){
        global $conn;
        
        $sql = "SELECT gender_id, gender FROM `gender` ORDER BY gender_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='".$record["gender_id"]."' >" . $record["gender"] . "</option>";
        }
    }
    function modal($count, $itemId){
        global $conn;
        
        $actId = $itemId; 
        
        $sql = "SELECT * FROM `actor`
                NATURAL JOIN `agency`
                NATURAL JOIN `genre`
                WHERE actor_id = :actId"; 
        
        $np = array(); 
        $np[":actId"] = $actId; 
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        
        echo "<td><button type='button' class='btn btn-dark' data-toggle='modal' data-target='#modal$count'>INFO</button></td>";
        echo "<div class='modal fade' id='modal$count' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>";
        
            echo "<div class='modal-dialog modal-dialog-centered' role='document'>";
                echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                        echo "<h5 class='modal-title' id='exampleModalCenterTitle'>" . $records[0][actor_firstname] . " " .  $records[0][actor_lastname] . "</h5>";
                        echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                            echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                        echo "<img id='modalImg' src=".$records[0][actor_photo]."><br>";
                        echo " <b>Age: </b>" . $records[0][actor_age] . "<br>";
                        echo " <b>Years Active: </b>" . $records[0][years_active] . "<br>";
                        echo " <b>Best Known For: </b>" . $records[0][known_for] . "<br>";
                    echo "</div>";
                    
                    echo "<div class='modal-body2'>";
                        echo "<hr>";
                        echo $records[0][genre_description]; 
                        echo "<hr>";
                    echo "</div>";
                    
                    echo "<div class='modal-body'>";
                        echo "<b>Agency: </b>" . $records[0][agency_name] ."<br>";
                        echo "<b>Phone: </b>" . $records[0][agency_phone] ."<br>";
                        echo "<b>Located: </b>" . $records[0][agency_location] ."<br>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                        echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                        echo "<button type='button' class='btn btn-primary'>Contact Agent</button>";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    }
    function displayResults() {
        global $items;
        if (isset($items) && empty($items)) {
            echo "<hr>";
            echo "<h2>No Actors Found</h2>"; 
        } else{
            if(isset($items)) {
                    
            echo "<hr>";
            echo "<h3>Actors Found </h3>"; 
            echo "<br />";
            echo "<table class='table' >";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>Name</td>";
            echo "<td>Age</td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
            $count = 0; 
            
            foreach ($items as $item) {
                $itemFirstName = $item['actor_firstname'];
                $itemLastName = $item['actor_lastname'];
                $itemAge = $item['actor_age'];
                $itemImage = $item['actor_photo'];
                $itemYearActive = $item['year_active'];
                $itemKnown = $item['known_for'];
                $itemId = $item['actor_id'];
                
                echo "<tr>";
                echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemFirstName"; 
                echo " ";
                echo "$itemLastName</h4></td>";
                echo "<td><h4>$itemAge</h4></td>";
                echo "<td><h4>$itemYearActive</h4></td>";
                modal($count, $itemId);
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='actor_firstname' value='$itemFirstName'>";
                echo "<input type='hidden' name='actor_lastname' value='$itemLastName'>";
                echo "<input type='hidden' name='actor_age' value='$itemAge'>";
                echo "<input type='hidden' name='actor_photo' value='$itemImage'>";
                echo "<input type='hidden' name='year_active' value='$itemYearActive'>";
                
                echo "</form>";
                
                echo "</tr>";
                
                $count++; 
            }
            
            echo "</table>";
        }
        }
    }
    function displayAllProducts(){
        
        global $conn;
        $sql="SELECT * FROM actor ORDER BY actor_firstname ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $items = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if(isset($items)) {
                    
            echo "<table class='table' >";
            echo "<tr>";
            echo "<td></td>";
            echo "<td>Name</td>";
            echo "<td>Age</td>";
            echo "<td>Years Active</td>";
            echo "<td>Known For</td>";
            echo "<td></td>";
            echo "</tr>";
            $count = 0; 
            
            foreach ($items as $item) {
                $itemFirstName = $item['actor_firstname'];
                $itemLastName = $item['actor_lastname'];
                $itemAge = $item['actor_age'];
                $itemImage = $item['actor_photo'];
                $itemYearActive = $item['years_active'];
                $itemKnown = $item['known_for'];
                $itemId = $item['actor_id'];
                
                $rest = substr($itemKnown, 0, 10); 
                
                echo "<tr>";
                echo "<td><img id='adminImg' src='$itemImage'></td>";
                echo "<td><h4>$itemFirstName"; 
                echo " ";
                echo "$itemLastName</h4></td>";
                
                echo "<td><h4>$itemAge</h4></td>";
                echo "<td><h4>$itemYearActive</h4></td>";
                
                echo "<td><h4>$rest...</h4></td>";
                echo "<td><a href='updateEntry.php?actor_id=$itemId' class='btn btn-outline-primary' role='button' aria-pressed='true'>Update</a>";
                echo " "; 
                echo "<a href='deleteActor.php?actor_id=$itemId' onclick='return confirm(\"Are you sure you want to delete?\")' class='btn btn-outline-danger' role='button' aria-pressed='true'>Delete</a></td>";
                
                echo "<form method='post'>";
                echo "<input type='hidden' name='actor_firstname' value='$itemFirstName'>";
                echo "<input type='hidden' name='actor_lastname' value='$itemLastName'>";
                echo "<input type='hidden' name='actor_age' value='$itemAge'>";
                echo "<input type='hidden' name='actor_photo' value='$itemImage'>";
                echo "<input type='hidden' name='year_active' value='$itemYearActive'>";
                
                echo "</form>";
                
                echo "</tr>";
                
                $count++; 
            }
            
            echo "</table>";
        }
        
    }
    function displayReports(){                                                                                                                                                                                                                                                          
        global $conn;
        
        $totalRows = $conn->query('SELECT count(1) FROM actor')->fetchColumn(); 
        $youngestRow = $conn->query('SELECT MIN(actor_age) FROM actor')->fetchColumn();
        $oldestRow = $conn->query('SELECT MAX(actor_age) FROM actor')->fetchColumn();
        $agency1 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 1')->fetchColumn();
        $agency2 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 2')->fetchColumn();
        $agency3 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 3')->fetchColumn();
        $agency4 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 4')->fetchColumn();
        $agency5 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 5')->fetchColumn();
        $agency6 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 6')->fetchColumn();
        $agency7 = $conn->query('SELECT count(1) FROM actor WHERE agency_id = 7')->fetchColumn();
        
        echo "<b>Total Entries:</b> ";
        echo $totalRows;
        echo "<br><b>Oldest Actor:</b> ";
        echo $oldestRow;
        echo "<br><b>Youngest Actor:</b> ";
        echo $youngestRow;
        echo "<br><b><u>Total In Each Agency</u>:</b> ";
        echo "<br>- <b>William Morris Endeavor:</b> " . $agency1;
        echo "<br>- <b>Creative Artists Agency:</b> " . $agency2;
        echo "<br>- <b>International Creative Management:</b> " . $agency3;
        echo "<br>- <b>Affinity Artists Agency:</b> " . $agency4;
        echo "<br>- <b>Glitter Talent Agency:</b> " . $agency5;
        echo "<br>- <b>Paonessa Talent Agency:</b> " . $agency6;
        echo "<br>- <b>Hayes Talent Agency:</b> " . $agency7;
    }
?>