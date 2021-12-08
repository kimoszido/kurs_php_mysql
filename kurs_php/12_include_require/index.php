<?php

    // include('ninjas.php');
    // require('ninjas.php');

    // include('ninjass.php'); // mimo nieznalezienia pliku wykonuje się dalej
    // require('ninjass.php'); // nieznaleziono pliku dalej sie nie wykonuje

    echo 'end of php';

?>
<!DOCTYPE html> 
<html>
    <head>
        <title>PHP Tutorials</title>
    </head>
    <body>
        
        <?php include('content.php'); ?>
        <?php require('content.php'); ?>

    </body>
</html>