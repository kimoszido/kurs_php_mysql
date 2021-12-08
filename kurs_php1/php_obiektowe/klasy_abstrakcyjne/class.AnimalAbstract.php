<?php
abstract class Animal
{
    protected $isHungry;
    function __construct($isHungry = true)
    {
        $this->isHungry = $isHungry;
    }
    abstract function eat($food);

    
    
}


?>