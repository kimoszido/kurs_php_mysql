<?php
require_once("class.Punkt.php");


class Punkt2D extends Punkt
{
    protected $y; 
    private $i; //private - dostępna tylko wewnątrz tej klasy

    public function __construct($x = 0, $y = 0)
    {
        parent::__construct($x);
        $this->y = $y;
    }
    public function getY()
    {
        return $this->y;
    }
    public function setY($y)
    {
        $this->y = $y;
    }
}

?>