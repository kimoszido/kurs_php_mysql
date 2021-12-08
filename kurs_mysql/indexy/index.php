<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
            require_once("generator.php");
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);
            
            //$query = "LOAD DATA LOCAL INFILE 'data.txt' INTO TABLE test FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n' (x,y,z)";
            
            //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
            
            //generateNumbers();
    
            $query = "SELECT * FROM test WHERE y = 50 AND x = 30 LIMIT 1";
            
            $time = microtime(true);
            for ($i = 0; $i < 5000; $i++)
            mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            $results = microtime(true) - $time;
            
            echo $results;
            
            mysqli_close($mysqliConnection);        
        ?>
        
       
        
     
    </body>
</html>



 