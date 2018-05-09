<?php
    include '../dbConnection.php';
    include 'inc/functions.php';
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
        <title> Search Database </title>
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
                            <li class="nav-item active">
                                <a class="nav-link" href="search.php">Search <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <!-- Display Search Results -->
                <?php displayResults(); ?>
                
                <!-- Form Elements -->
                <form enctype="text/plain">
                    <br /> <br /> <br />
                    <label for="bName"><strong>Gender:</strong> </label>
                    <select class="custom-select" name="gender_id">
                        <option value=""> Select One </option>
                        <?=displayGenders()?>
                    </select><br /><br />
                    <label for="bName"><strong>Category:</strong> </label>
                    <select class="custom-select" name="genres">
                        <option value=""> Select One </option>
                        <?=displayGenres()?>
                    </select><br /><br />
                    <label for="bName"><strong>Agency:</strong> </label>
                    <select class="custom-select" name="agencies">
                        <option value=""> Select One </option>
                        <?=displayAgencies()?>
                    </select>
                    <br><br>
                    <label for="bName"><strong>Age:</strong></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">From:</span>
                        </div>
                        <input type="text" name="age_from" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <div class="input-group mb-3" >
                        <div class="input-group-prepend" >
                            <span class="input-group-text">To: </span>
                        </div>
                        <input type="text" name="age_to" class="form-control" aria-label="Amount (to the nearest dollar)">
                    </div>
                    <label for="bName"><strong>Order result by: </strong></label><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="orderBy"  value="age_desc" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Age (desc)</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="orderBy"  value="age_asc" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Age (asc)</label>
                    </div><br />
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="orderBy" value="years_active"class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline4">Years Active</label>
                    </div><br /><br />
                    <input id="submitButton" type="submit" name="searchForm" value="Submit" class="btn btn-primary btn-lg"><br /><br />
                </form>
                <?php
                    include 'inc/footer.php';
                ?>
            </div>
        </div>
    </body>
</html>
