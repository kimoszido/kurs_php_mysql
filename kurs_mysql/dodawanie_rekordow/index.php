<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Dodawanie rekordów do bazy - by Arkadiusz Włodarczyk - videokurs.pl</title>
        
    </head>
    <body>

        <?php           
            
            $mysqlConnection = new mysqli("localhost", "root", "", "kursmysql");
            !mysqli_connect_errno() or die(mysqli_error($mysqlConnection));
            
            mysqli_set_charset($mysqlConnection, "utf8");
            
            $imie = "<script>alert('tralal');</script>";
            $wiek = "34sdsadas";
            
            $imie = filter_var($imie, FILTER_SANITIZE_SPECIAL_CHARS);
            $wiek = (int)$wiek;
            echo $imie;
            echo $wiek;
            $query = "
               INSERT INTO klienci (imie, nazwisko, wiek, ref)
               VALUES
               ('$imie', 'Nowak', $wiek, NULL),
               ('Karol', 'Nowak', 34, 'http://videokurs.pl')
               
            ";
            
            !mysqli_query($mysqlConnection, $query) or die(mysqli_error($mysqlConnection));
           
            
            mysqli_close($mysqlConnection);
        
        ?>
    </body>
</html>



