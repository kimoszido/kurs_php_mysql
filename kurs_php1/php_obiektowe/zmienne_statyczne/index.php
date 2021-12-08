<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Zmienne statyczne</title>
    </head>
    <body>

<?php
    require_once("customer.php");

    for($i = 0; $i < 10; $i++)
    {
        $a[$i] = new Customer();
    }

    $b = new Customer();

    echo $a[4]->id."<br/>";
    echo Customer::getNumberOfCustomers();

?>

    </body>
</html>
