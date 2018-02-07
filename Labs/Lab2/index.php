<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
    </head>
    <body>
        <?php
            include 'inc/functions.php'; 
            for($i=1; $i<4; $i++){
                ${"randomValue" . $i } = rand(0,2);
                displaySymbol(${"randomValue" . $i} );
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);   
        ?>
    </body>
</html>