<?php

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Winter Family Planner </title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
</style>
    </head>
    <body>
      
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: dropdown menu, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Errors are displayed if month or number of locations are not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>Header and Subheader are displayed with info submitted. </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#99E999">
      <td>4</td>
      <td>A table with days and weeks is displayed when submitting the form</td>
      <td align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>5</td>
      <td>The number of days in the table correspond to the month selected</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#FFC0C0">
      <td>6</td>
      <td>Random images are displayed in random days</td>
      <td align="center">5</td>
    </tr>       
    <tr style="background-color:#FFC0C0">
      <td>7</td>
      <td>The number of random images correspond to the number of locations and country submitted</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>8</td>
      <td>The proper name of the location is displayed below the image 
      		(e.g. "New York", "Las Vegas")</td>
      <td align="center">10</td>
    </tr>  
    <tr style="background-color:#FFC0C0">
      <td>9</td>
      <td>The list of months submitted along with the country and number of locations is displayed below the table (using Sessions)</td>
      <td align="center">15</td>
    </tr>    
    <tr style="background-color:#FFC0C0">
      <td>10</td>
      <td>Random locations should be ordered alphabetically, if user checks corresponding radio button (A-Z or Z-A). </td>
      <td align="center">15</td>
    </tr>        
    <tr style="background-color:#FFC0C0">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>

    
    
        <h1> Winter Family Planner </h1>
    
    <div id="main">
    <form method="GET">
        <legend><label for="month">Select Month: </label>
            <select id="month" name="monthSelect">
                <option value="">Select </option> 
                <option value="November"    <?=($_GET['monthSelect']=="November")? " selected":""?>>November</option>
                <option value="December"     <?=($_GET['monthSelect']=="December")? " selected":""?>>December</option>
                <option value="January"    <?=($_GET['monthSelect']=="January")? " selected":""?>>January</option>
                <option value="February"    <?=($_GET['monthSelect']=="February")? " selected":""?>>February</option>
            </select>
        </legend>    
        <br />
            
        <legend>Number of locations: 
            <input id="Three" type="radio" name="numOfLocations" value="3"    <?= ($_GET['numOfLocations']=="3")?"checked":"" ?>>
            <label for="Three">Three</label>
            <input id="Four" type="radio" name="numOfLocations" value="4"    <?= ($_GET['numOfLocations']=="4")?"checked":"" ?>>
            <label for="Four">Four</label>
            <input id="Five" type="radio" name="numOfLocations" value="5"    <?= ($_GET['numOfLocations']=="5")?"checked":"" ?>>
            <label for="Five">Five</label>    
        </legend>
        <br />
        
        <legend><label for="country">Select Country: </label>
            <select id="country" name="countrySelect">
                <option value="USA"     <?=($_GET['countrySelect']=="USA")? " selected":""?>>USA</option>
                <option value="Mexico"    <?=($_GET['countrySelect']=="Mexico")? " selected":""?>>Mexico</option>
                <option value="France"    <?=($_GET['countrySelect']=="France")? " selected":""?>>France</option>
            </select>
        </legend>
        <br />    
            
        <legend>Visit locations in alphabetical order: 
            <input id="az" type="radio" name="alphorder" value="asc"    <?= ($_GET['alphorder']=="asc")?"checked":"" ?>>
            <label for="az">A-Z </label>
            <input id="za" type="radio" name="alphorder" value="desc"    <?= ($_GET['alphorder']=="desc")?"checked":"" ?>>
            <label for="za">Z-A </label>
        </legend>
        <br />  
        <input type="submit" value="Creat Itinerary"/>
        
        <?php
            if(isset($_GET['monthSelect']) && empty($_GET['monthSelect'])){
                //echo "<br />";
                echo "<h4>You must select a Month!</h4>";
            }
            if(isset($_GET['monthSelect']) && empty($_GET['numOfLocations'])){
                //echo "<br />";
                echo "<h4>You must specify the number of locations!</h4>";
            }
            
            
            if(!empty($_GET['monthSelect']) && !empty($_GET['numOfLocations']) && !empty($_GET['countrySelect']) && !empty($_GET['alphorder'])){
        
                $month = $_GET['monthSelect']; 
                $number = $_GET['numOfLocations']; 
                $country = $_GET['countrySelect']; 
                echo "<br /><hr>"; 
                echo "<h2>" . $month . " Itinerary </h2>";
                echo "<h3>Visiting " . $number . " places in " . $country . "</h3>";
                echo "<hr><br />"; 
            
            
            
                switch($month){
                    case January: 
                        $days = 31; 
                        break; 
                    case February: 
                        $days = 28;
                        break; 
                    case November: 
                        $days = 30;
                        break; 
                    case December: 
                        $days = 31;
                        break; 
                }
                
                $randomDays = array(); 
                for($i= 0; $i< $number; $i++){
                    $randomDays[$i] = rand(1, $days); 
                }
                
                $dayCount = 1; 
              
                echo "<table style='width:100%'>"; 
                $count = 1; 
                for($i = 1; $count <= $days; $i++){
                    echo "<tr>"; 
                    for($j = 1; $j <= 7; $j++){
                        echo "<th height='120'>"; 
                            
                            if($count <= $days){
                                echo $count;
                                $count++; 
                            }
                            else{
                                echo " "; 
                            }

                        echo "</th>";
                    }
                    echo "</tr>"; 
                }
                echo "</table>"; 
            
            
            
                //}
                
                
            }
        ?>
    </form>  
    </div>
    </body>
</html>