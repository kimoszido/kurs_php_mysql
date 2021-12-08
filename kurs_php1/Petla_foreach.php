<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php

    for ($i = 0; $i < 10; $i += 2){
        $tab[] = $i;
    }
    for ($i = 0; $i < count($tab); $i++)
    {
        echo $tab[$i]."<br />";
    }

    $tab['imie'] = "Adam";
    $tab['nazwisko'] = "Bialik";

    echo "<br /> ---------------------------------- <br />";

    foreach ($tab as $key => $value)
    {
        echo $key." = ".$value."<br />";
    }

    echo "<br /> ---------------------------------- <br />";

    foreach ($tab as $key => $value)
    {
        echo $tab[$key]."<br />";
    }

    echo "<br /> ---------------------------------- <br />";

    foreach ($tab as $value)
    {
        echo $value."<br />";
    }



?>

    </body>
</html>