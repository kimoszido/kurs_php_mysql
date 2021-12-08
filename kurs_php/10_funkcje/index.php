<?php

$products = [
    ['name'=>'shiny star', 'price'=>20],
    ['name'=>'green shell', 'price'=>10],
    ['name'=>'red shell', 'price'=>15],
    ['name'=>'gold coin', 'price'=>5],
    ['name'=>'lightning bolt', 'price'=>40],
    ['name'=>'banana skin', 'price'=>2]
];

//function

function sayHello($name = 'shaun'){
    echo "good moring $name";
}
// sayHello();
// echo '<br/>';
// sayHello('mario');

// function formatProduct($product){
//     echo "{$product['name']} costs \${$product['price']} to buy <br />"; //nawiasy klamrowe po to żeby dobrze odczytał nawaisy kwadratowe
// }

//formatProduct(['name'=>'gold star', 'price'=>20]);

function formatProduct($product){
    return "{$product['name']} costs \${$product['price']} to buy <br />";
}

$formated = formatProduct(['name'=>'gold star', 'price'=>20]);
//echo $formated;

function sayHello1($name = 'shaun', $time = 'morning'){
    echo "good $time $name";
}
 sayHello1('Adam', 'night');


?>
<!DOCTYPE html> 
<html>
    <head>
        <title>PHP Tutorials</title>
    </head>
    <body>
        


    </body>
</html>