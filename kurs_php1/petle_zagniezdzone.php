<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php

    for ($i = 1; $i <= 9; $i++)
    {
        for ($j = 1; $j <= 9; $j++)
        {
            echo $i." * ".$j." = ". $i * $j."&nbsp;&nbsp;&nbsp;&nbsp;";
        }
        echo "<br/>";
    }

?>

    </body>
</html>