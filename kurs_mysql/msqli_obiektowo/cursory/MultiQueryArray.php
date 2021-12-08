<?php
require_once("MultiQuery.php");

class MultiQueryArray extends MultiQuery
{
    protected $allQueries;
    const AS_ARRAY = 'processQueryAsArray';
    function __construct($dbc_h) 
    {
        parent::__construct($dbc_h);
        $this->allQueries = array();
    }
    public function multi_query($query, $processing_function)
    {
        $this->allQueries = array();
        
        return parent::multi_query($query, $processing_function);
        
        
    }
    public function processQueryAsArray($result)
    {
        $tmp = array();
        
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($tmp, $row);
        }
        
        array_push($this->allQueries, $tmp);
    }  
    public function getQueryResultSet($queryNr)
    {
        if ($this->allQueries)
        {
            if (sizeof($this->allQueries)> $queryNr)
              return $this->allQueries[$queryNr];
            else
              throw new Exception("AllQueries Exception thrown, error in file: ".basename(__FILE__).", line: ".__LINE__);
        }
    }
    public function returnedValue() 
    {
        if ($this->actualProcessingFunction == self::AS_ARRAY)
            return $this->allQueries;
        else
            return parent::returnedValue ();
    }
    public function getNumberOfQueries()
    {
        return sizeof($this->allQueries);
    }
}

?>
