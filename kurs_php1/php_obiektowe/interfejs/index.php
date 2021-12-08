<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Interfejsy</title>
    </head>
    <body>

<?php
//INTERFACE - regóła tworzenia czegoś, wszytskie klasy, które implementują 
//interfejs muszą mieć wszystkie funkcje które się wnim znajdują
//nie można tworzyć zmiennych
//możn


    echo EkranInterface::KOLOR;

    interface EkranInterface
    {
        const KOLOR = "czarny";
        function wyswitl(); //każda funkcja w interfejsie automatycznie jest abstrakcyjna i publiczna
    }

    interface PrzyciskiInterface
    {
        function on();
    }

    class MonitorA implements EkranInterface, PrzyciskiInterface
    {
        function wyswitl()
        {
            
        }
        function on()
        {
            
        }
    }

    class MonitorB implements EkranInterface
    {
        function wyswitl()
        {
            
        }
    }


?>

    </body>
</html>
