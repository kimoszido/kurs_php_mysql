<?php
    
    //indexed arrays

    $peopleOne = ['shaun', 'crystal', 'ryru'];
    //echo $peopleOne[1];

    $peopleTwo = array('ken', 'chun-li');
    // echo $peopleTwo[1];

    $ages = [20, 20, 40, 50];
    //print_r($ages);

    $ages[1] = 25;
    //print_r($ages);

    $ages[] = 60; //dodanie kolejnej pozycji do tablicy
    //print_r($ages);

    array_push($ages, 70);
    //print_r($ages);

    //echo count($ages);

    $peopleThree = array_merge($peopleOne, $peopleTwo); //łączenie tablic
    //print_r($peopleThree);

    //associative arrays (key and value pairs)

    $ninjasOne = ['shaun' => 'black', 'mario' => 'orange', 'luigi' => 'brown'];
    //echo $ninjasOne['mario']
    //print_r($ninjasOne);

    $ninjasTwo = array('bowser' => 'green', 'peach' => 'yellow');
    //print_r($ninjasTwo);

    $ninjasTwo['toad'] = 'pink';
    //print_r($ninjasTwo);

    //$ninjasTwo['peach'] = 'pink'; //zastąpienie wartości o podanym kluczu
    //print_r($ninjasTwo);

    //echo count($ninjasOne)

    $ninjasThree = array_merge($ninjasOne, $ninjasTwo);
    //print_r($ninjasThree);

?>
<!DOCTYPE html> 
<html>
    <head>
        <title>PHP Tutorials</title>
    </head>
    <body>
        
    </body>
</html>