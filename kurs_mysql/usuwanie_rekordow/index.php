<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Usuwanie rekordów z bazy danych - by Arkadiusz Włodarczyk - videokurs.pl</title>
        
    </head>
    <body>

        <?php           
            
            $mysqlConnection = new mysqli("localhost", "root", "", "kursmysql");
            !mysqli_connect_errno() or die(mysqli_error($mysqlConnection));

            mysqli_set_charset($mysqlConnection, "utf8");
            
            $query = "DELETE FROM klienci
                      WHERE 
                      login = '' OR haslo = ''
                
            ";
            
            !mysqli_query($mysqlConnection, $query) or die(mysqli_error($mysqlConnection));
           
            
            mysqli_close($mysqlConnection);
        
        ?>
    </body>
</html>



