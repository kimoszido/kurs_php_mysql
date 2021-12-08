<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Klasy Abstrakcyjne</title>
    </head>
    <body>

<?php

    require_once("class.Dog.php");
    require_once("class.Cat.php");

    $a = new Dog();
    $a->eat("meat");
    $a->eat("trawa");

    $b = new Cat();
    $b->eat("milk");
    $b->eat("trawa");

?>

    </body>
</html>
