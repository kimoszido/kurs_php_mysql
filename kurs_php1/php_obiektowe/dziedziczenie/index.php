<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Dziedziczenie</title>
    </head>
    <body>

<?php

    require_once("class.Punkt3D.php");


    $p = new Punkt(1);

    //echo $p->x."<br/>
    echo $p->getX()."<br/>
    ____________________________ <br/>";

    

    $p2 = new Punkt2D(1 ,2);

    /*echo $p2->x."<br/>";
    echo $p2->y."<br/>";*/

    $p2->setX(20);
    echo $p2->getX()."<br/>";
    echo $p2->getY()."<br/>
    ____________________________ <br/>";

?>

    </body>
</html>
