<?php
require_once("class.AnimalAbstract.php");

class Cat extends Animal
{
    protected $eatableFood = array("bird", "milk");

    function eat($food)
    {
        $isEatable = false;
        foreach($this->eatableFood as $value)
        {
            if ($value == $food)
            {
                $isEatable = true;
                break;
            }
        }
        if($isEatable)
        {      
            if($this->isHungry)
            {
                echo "jem $food<br/>";
                $this->isHungry = false;
            }
            else
                echo "Nie jestem głodny <br/>";
        }
        else
            echo "Ja nie jem $food <br/>";
    }

    
}



?>