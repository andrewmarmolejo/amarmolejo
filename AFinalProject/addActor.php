<?php
    session_start();
    include "../dbConnection.php";
    include "inc/functions.php";
    $conn = getDatabaseConnection("casting");
    if(!isset( $_SESSION['adminName'])){
    header("Location:admin.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add An Entry </title>
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
                                 $("#taken").html("<span id='unavSpan'><small>Actor already appears in database.</small></span>"); 
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
                <h1> Add An Entry </h1>
                <form method="POST" action="database.php">    
                    <input type="submit" name="returnAdmin" value="Go Back"><br /><br />
                </form>
                
                <!-- Add Actor Form -->
                <form>
                    <div class="form-group">
                        <input type="text" id="firstName" class="form-control" name="actor_firstname" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="lastName" class="form-control" name="actor_lastname" placeholder="Last name" required>
                        <span id="taken"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="actor_age" placeholder="Age" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="gender_id">
                            <option>Select Gender</option>
                            <?php displayGenders(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="years_active" placeholder="Years Active" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="actor_photo" rows="3" placeholder="Photo URL"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="known_for" placeholder="Best Known For" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="genre_id">
                            <option>Select Category</option>
                            <?php displayGenres(); ?>
                        </select>
                    </div> 
                    <div class="form-group">
                        <select class="form-control" name="agency_id">
                            <option>Select Agency</option>
                            <?php displayAgencies(); ?>
                        </select>
                    </div>
                    <input type="submit" name="submitProduct" value="Add Actor">
                </form>
            
                <?php
                    include 'inc/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>