<?php

interface MultiQueryI
{
    /**
     * to jest funkcja, któa musi zostać zaimplementowana przez wszystkie klasy, które będą 
     * rozszerzać klasę MultiQuery i ta funkcja ma powiedzieć CO ZOSTANIE ZWRÓCONE przez funkcję multi_query, przy zastosowaniu jej funkcji przetwarzających
     * Example:
     *  if ($this->actualProcessingFunction == 'processQueryAsArray')
            return $this->allQueries;
        else
            return parent::returnedValue();
     * 
     */
    function returnedValue();
}
?>
