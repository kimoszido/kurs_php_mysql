<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Klonowanie/Kopiowanie</title>
    </head>
    <body>

<?php

    /*
    $a = 50;
    $b = &$a;

    $b = 70; 

    echo $a."<br/>";
    echo $b."<br/>";
    */

    class Student
    {
        public $imie;
        public $oczy;
        public function __construct($imie, $kolor)
        {
            $this->imie = $imie;
            $this->oczy = new Oczy($kolor);
        }
        public function __clone()
        {
            $this->oczy = clone $this->oczy;
        }
    }

    class Oczy
    {
        public $kolor;
        public function __construct($kolor)
        {
            $this->kolor = $kolor;
        }
    }

    $a = new Student("Adam", "Niebieskie");
    //$b = $a;
    $b = clone $a;

    $b->imie = "Ala";
    $b->oczy->kolor = "Zielony";

    echo $a->imie."<br/>";
    echo $a->oczy->kolor."<br/>";
    echo $b->imie."<br/>";
    echo $b->oczy->kolor."<br/>";

?>

    </body>
</html>
