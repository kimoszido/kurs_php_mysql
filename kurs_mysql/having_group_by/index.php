<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql2');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);
            
            $query = "SELECT  sum(z.kwota) suma, c.firstname FROM zamowienia z
            JOIN clients c ON c.id = z.id_klienta
            GROUP BY z.id_klienta DESC 
            HAVING suma > 10 ";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            /**
             * sum - suma 
             * avg - srednia
             * min - najmniejsza
             * max - najwieksza
             * count - liczebność
             * 
             */
            
            if(mysqli_num_rows($result) > 0)
            {
                echo mysqli_num_rows($result)."<br/>";
                while($row = mysqli_fetch_assoc($result))
                {
                    print_r($row);
                    echo "<br/>";
                }
            }
            
            mysqli_close($mysqliConnection);        
        ?>
        
       
        
     
    </body>
</html>



 