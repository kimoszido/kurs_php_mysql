<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Wyjąki</title>
    </head>
    <body>

<?php
    require_once("class.FileRead.php");

    try    
    {
        $reader = new FileRead("nazwa.txt");

        echo $reader->getWholeContent();
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }

?>

    </body>
</html>
