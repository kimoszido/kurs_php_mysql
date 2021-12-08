<?php
    class FileRead
    {
        protected $filePointer;
        protected $fileName;
        protected $isFileOpem = true;
        function __construct($fileName)
        {
            $this->fileName = $fileName;
            if(!($this->filePointer = @fopen($fileName, "r")))
            {
                $this->isFileOpem = false;
                throw new Exception("Plik o nazwie $fileName nie istnieje");
            }
        }
        function __destruct()
        {
            if($this->isFileOpem)
            {
                //echo "Zamknąłem";
                fclose($this->filePointer);
            }
        }
        function getWholeContent()
        {
            return fread($this->filePointer, filesize($this->fileName));
        }
    }


?>