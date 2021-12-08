<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Aktualizacja rekordów z bazy danych - by Arkadiusz Włodarczyk - videokurs.pl</title>
        
    </head>
    <body>

        <?php  
        
            $mysqlConnection = new mysqli("localhost", "root", "", "kursmysql");
            !mysqli_connect_errno() or die(mysqli_error($mysqlConnection));
                 
            $query = "
                UPDATE klienci SET
                wiek = 20
                WHERE
                ref IS NULL
            ";
            
            mysqli_query($mysqlConnection, $query) or die(mysqli_error($mysqlConnection));
            
            
            mysqli_close($mysqlConnection);
        
        ?>
    </body>
</html>



