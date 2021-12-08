<?php
require_once("class.Punkt2D.php");

class Punkt3D extends Punkt2D
{
    protected $z;

    public function __construct($x = 0, $y = 0, $z = 0)
    {
        parent::__construct($x, $y);
        $this->z = $z;
    }
    public function getZ()
    {
        return $this->z;
    }
    public function setZ($z)
    {
        $this->z = $z;
    }
}

?>