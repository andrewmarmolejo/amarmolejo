<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Carrois+Gothic+SC" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic+Coding" rel="stylesheet">
    </head>
    <body>
        <h1> OtterMart - Admin Login </h1>
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username"/> <br /><br />
            Password: <input type="password" name="password"/> <br /><br />
            
             <input type="submit" name="submitForm" value="Login!" />
        </form>
        <img id="logo" src="img/ver.png" alt="CSUMB Logo"/>
    </body>
</html>