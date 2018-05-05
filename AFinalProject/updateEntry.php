<?php
    include '../dbConnection.php';
    include 'inc/functions.php';
    $connection = getDatabaseConnection("casting");
    if(isset ($_GET['actor_id'])){
        $product = getProductInfo();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Update Actor Information </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
           $(document).ready(function(){
                $("#lastName").change(function(){
                    //alert($("#firstName").val() +" "+$("#lastName").val() );
                    $.ajax({
                        type: "GET",
                        url: "checkActorAPI.php",
                        dataType: "json",
                        data: { "actor_lastname": $("#lastName").val() },
                        success: function(data,status) {
                             //alert(data);
                             if (!data) {  //data == false
                                //alert("Username is Available");
                                $("#taken").html("");
                             } else {
                                //alert("Username is ALREADY TAKEN");
                                 $("#taken").html("<span id='unavSpan'> - Actor already appears in database.</span>"); 
                             }
                             
                        
                        },
                        complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                        }

                    });//ajax
                });
            });
        </script>
        <style>
            @import url("css/styles1.css");
            form {
                display: inline;
            }
        </style>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete it?");
            }
        </script>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                <!-- Bootstrap Navagation Bar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="https://csumb.edu/">CSUMB</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="search.php">Search</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="admin.php">Admin<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <!--Title & Button-->
                <h1> Update Actor Information </h1>
                <form method="POST" action="database.php">    
                    <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
                </form>
                
                <!--Form Elements & Submit-->
                <form>
                    <input type="hidden" name="actor_id" value= "<?=$product['actor_id']?>"/>
                    <div class="form-group">
                        <!--<label for="validationDefault01">First Name</label>-->
                        <input type="text" id="firstName" class="form-control" name="actor_firstname" value = "<?=$product['actor_firstname']?>" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <!--<label for="validationDefault02">Last Name</label>-->
                        <input type="text" id="lastName" class="form-control" name="actor_lastname" value = "<?=$product['actor_lastname']?>" placeholder="Last name" required>
                        <span id="taken"></span>
                    </div>
                    <div class="form-group">
                      <label for="validationDefault03">Age</label>
                      <input type="text" class="form-control" name="actor_age" value = "<?=$product['actor_age']?>" placeholder="Age" required>
                    </div>
                    <div class="form-group">
                        <!--<label for="exampleFormControlSelect">Gender</label>-->
                        <select class="form-control" name="gender_id">
                            <option>Select Gender</option>
                            <?php displayTheGenders($product['gender_id']); ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="validationDefault04">Years Active</label>
                      <input type="text" class="form-control" name="years_active" value = "<?=$product['years_active']?>" placeholder="Years Active" required>
                    </div>
                    <div class="form-group">
                        <!--<label for="exampleFormControlTextarea1">Photo URL</label>-->
                        <textarea class="form-control" name="actor_photo" rows="3" placeholder="Photo URL"><?=$product['actor_photo']?></textarea>
                    </div>
                    <div class="form-group">
                      <!--<label for="validationDefault05">Best Known For</label>-->
                      <input type="text" class="form-control" name="known_for" value = "<?=$product['known_for']?>" placeholder="Best Known For" required>
                    </div>
                    <div class="form-group">
                        <!--<label for="exampleFormControlSelect1">Category</label>-->
                        <select class="form-control" name="genre_id">
                            <option>Select Category</option>
                            <?php displayTheGenres( $product['genre_id'] ); ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <!--<label for="exampleFormControlSelect1">Agency</label>-->
                        <select class="form-control" name="agency_id">
                            <option>Select Agency</option>
                            <?php getTheAgency( $product['agency_id']); ?>
                        </select>
                    </div>
                    <input type="submit" name="updateProduct" value="Update">
                </form>
                <?php 
                    include 'inc/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>