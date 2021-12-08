<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php

use Customer as GlobalCustomer;
use nazwaPrzestrzeni\Customer as NazwaPrzestrzeniCustomer;

require_once("class.Customer.php");

    class Customer
    {
        public $a = "SSSS";
    }

    $c = new GlobalCustomer;
    echo $c->a;

    $a = new NazwaPrzestrzeniCustomer;
    echo $a->nazwa;

?>

    </body>
</html>
