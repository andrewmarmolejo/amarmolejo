<?php
    session_start();
    if(isset( $_SESSION['adminName'])){
        header("Location:database.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <title> Admin Login </title>
        <style>
            @import url("css/styles1.css");
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
                                <a class="nav-link" href="admin.php">Admin <span class="sr-only">(current)</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <!-- Jumbotron For Login Inputs -->
                <div class="jumbotron">
                    <h1> CSUMB</h1>
                    <h2> Casting Database </h2><br>
                    <form method="POST" action="loginProcess.php">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Username</span>
                            </div>
                            <input name="username" type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Password</span>
                            </div>
                            <input name="password" type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <br />
                        <input id="submitButton" type="submit" name="searchForm" value="Log In" class="btn btn-primary btn-lg active">
                    </form>
                </div>    
            </div>
            <?php 
                include 'inc/footer.php';
            ?>
        </div>
    </body>
</html>