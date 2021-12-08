<?php
require_once("class.AnimalAbstract.php");

class Dog extends Animal
{
    protected $eatableFood = array("meat", "chicken");
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