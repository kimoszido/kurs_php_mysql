<?php

class Punkt
{
    protected $x; //protected - mamy dostep do zmiennej z klasy która dziedziczy 
                  //ale nie mamy dostępu z instanicji klasy ($p->x)

    public function __construct($x = 0)
    {
        $this->x = $x;
    }
    public function getX()
    {
        return $this->x;
    }
    public function setX($x)
    {
        if ($x > 50 || $x < 0)
            echo "Wartośc z poza zakresu <br/>";
        else
            $this->x = $x;
    }


}

?>