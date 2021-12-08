<?php    
    set_time_limit(900);
    function generateNumbers($numberOfCombinations = 100, $fileName = "data.txt")
    {
        
        $records = "";

        for ($x = 0; $x < $numberOfCombinations; $x++)
        {
            for ($y = 0; $y < $numberOfCombinations; $y++)
            {
                for ($z = 0; $z < $numberOfCombinations; $z++)
                {
                    $records .= "$x,$y,$z\n";
                }
            }            
        }

        $file = fopen($fileName, "w");

        fwrite($file, $records);

        fclose($file);
    }
?>
