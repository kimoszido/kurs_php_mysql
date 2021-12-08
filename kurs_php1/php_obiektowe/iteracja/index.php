<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Iterazje</title>
    </head>
    <body>

<?php

    class A implements Iterator
    {
        
        //public $a = "one";
        //protected $b = "two";
        //private $c = "three";
        public $tab = array("lala"=>"one", "two", "three", "four");       

        public function Iterate()
        {
            foreach($this as $key => $value)
            {
               
                if (is_array($value))
                {
                    foreach($value as $key => $value)
                    {
                        echo "Key = $key <br/>
                            Value = $value <br/>";
                    }    
                }
                else
                {
                    echo "Key = $key <br/>
                    Value = $value <br/>";
                }
            }
        } 
        public function current()
        {
            return current($this->tab);
        }
        public function key()
        {
            return key($this->tab);
        }
        public function next()
        {
            next($this->tab);
        }
        public function rewind()
        {
            reset($this->tab);
        }
        public function valid()
        {
            return (key($this->tab) !== NULL && key($this->tab) !== FALSE);
        }
    }

    $a = new A();

    foreach($a as $key => $value)
    {
        echo "Key = $key <br/>
            Value = $value <br/>";
    }

    /*
    foreach($a as $key => $value)
    {
        echo "Key = $key <br/>
              Value = $value <br/><br/>";
    }
    */
    /*
    $tab = array("lala"=>"one", "two", "three", "four");   
    echo current($tab);
    next($tab);
    echo current($tab);
    next($tab);
    echo current($tab);
    */

    //$a->Iterate();

?>

    </body>
</html>
