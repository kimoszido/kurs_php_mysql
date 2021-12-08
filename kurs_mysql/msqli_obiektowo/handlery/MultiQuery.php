<?php
require_once("MultiQueryI.php");

class MultiQuery implements MultiQueryI
{
    protected $dbc_h;
    protected $actualProcessingFunction;
    const AS_DUMP = 'processQueryAsDump';
    public function __construct($dbc_h)
    {
        $this->dbc_h = $dbc_h;
    }
    public function multi_query($query, $processing_function)
    {
        mysqli_query($this->dbc_h,"START TRANSACTION");
        if (mysqli_multi_query($this->dbc_h, $query))
        {            
            $this->actualProcessingFunction = $processing_function;
            do
            {
                $result = mysqli_store_result($this->dbc_h);
                if ($result)
                {
                    $this->$processing_function($result);

                    mysqli_free_result($result);
                }
            }
            while(mysqli_more_results($this->dbc_h) && $is_next_result_ok = mysqli_next_result($this->dbc_h));
          
            if (isset($is_next_result_ok) && !$is_next_result_ok)
                throw new Exception (mysqli_error($this->dbc_h).mysqli_rollback ($this->dbc_h));
            
            mysqli_commit($this->dbc_h);
        }
        else
            throw new Exception (mysqli_sqlstate ($this->dbc_h).mysqli_error($this->dbc_h));
        
       
        return $this->returnedValue();
    }  

    public function processQueryAsDump($result)
    {
        if (mysqli_num_rows($result) > 0)
        {
            echo mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result))
            {
              var_dump($row);
            }
        }
    }    
    public function returnedValue() 
    {
        return true;
    }
}
?>
