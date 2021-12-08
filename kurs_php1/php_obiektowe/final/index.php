<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Final</title>
    </head>
    <body>

<?php

    /*final class A
    {

    }
    class B extends A
    {

    }*/

    /*class A
    {
        final function mA()
        {
            echo "To jest funkcja z klasy A";
        }
    }
    class B extends A
    {
        function mA()
        {
            echo "Nie można zmieniać funkcji final";
        }
    }*/

    class A
    {
        function mA()
        {
            echo "To jest funkcja z klasy ".__CLASS__;
        }
    }
    class B extends A
    {
    
    }
    $b = new B();
    $b->mA();
?>

    </body>
</html>
