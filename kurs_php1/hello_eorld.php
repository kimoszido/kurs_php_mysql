<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php


    $tab[0] = 10;
    $tab[] = 2;
    $tab[0] = 100;


    echo "<pre>";
    print_r($tab);
    echo "</pre>";

    $tab1['imie'] = 'Adam';
    $tab1['nazwisko'] = 'Bialik';

    echo "<pre>";
    print_r($tab1);
    echo "</pre>";

    $a = 110;
    $b = 100;

    echo "<br>-----------------------s";

    echo ($a >$b) ? $a : $b;

    $isGreenChecked = true;
    echo "<input type='checkbox' name='kolor' value='green'".(($isGreenChecked) ? "checked" : "")."/>";


 ?>

    </body>
</html>
