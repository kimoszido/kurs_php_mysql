<?php

// $products = [
//     ['name'=>'shiny star', 'price'=>20],
//     ['name'=>'green shell', 'price'=>10],
//     ['name'=>'red shell', 'price'=>15],
//     ['name'=>'gold coin', 'price'=>5],
//     ['name'=>'lightning bolt', 'price'=>40],
//     ['name'=>'banana skin', 'price'=>2]
// ];

//ZMIENNE LOKALNE I GLOBALNE

function myFunc(){
    $price = 10;
    echo $price;
}

// myFunc();
// echo $price; //błąd

function myFuncTwo($age){
    echo $age;
}

// myFuncTwo(25);
// echo $age; //błąd

$name = 'mario';

// function sayHello(){
//     global $name;
//     $name = 'yoshi';
//     echo "hello $name";
// }
// sayHello();
// echo $name;

function sayBye(&$name){ //& zmienna zmieni sie rónież poza funkcją
    $name = 'wario';
    echo "bye $name";
}
sayBye($name);
echo $name;




?>
<!DOCTYPE html> 
<html>
    <head>
        <title>PHP Tutorials</title>
    </head>
    <body>
        


    </body>
</html>