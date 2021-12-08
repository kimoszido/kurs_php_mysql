<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Klasy - obiekty</title>
    </head>
    <body>

<?php
    
    require_once("class.Time.php"); //jeżeli nie otworzy pliku nie wykona dalszych instrukcji

    /**echo getCurrentTime() ."<br/>";
    echo getCurrentTime() ."<br/>";
    echo getFeatureTime(10) ."<br/>";*/

    $a = new Time();
    $b = new Time("America/Atka");
    $c = new Time("Australia/Broken_Hill");

    echo $a->setFutureTime(5) ."<br/>";
    echo $b->setFutureTime(10) ."<br/>";

    echo "_________________________ <br/>";

    echo $a->futureTime ."<br/>";
    $b->setFutureTime(2) ."<br/>";
    echo $b->futureTime ."<br/>";

    echo "__________________________ <br/>";

    echo $a->currentTime ."<br/>";

    echo "__________________________ <br/>";

    echo $a ."<br/>";
    echo $b ."<br/>";
    echo $c ."<br/>";

    echo "__________________________ <br/>";

    $a->setFutureTime("4");
    echo $a->futureTime."<br/>";
    echo $b->currentTime;


?>

    </body>
</html>
