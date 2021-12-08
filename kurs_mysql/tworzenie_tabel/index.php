<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Tworzenie tabel - by Arkadiusz Włodarczyk - videokurs.pl</title>
        
    </head>
    <body>
  
        <?php           
            
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
            !mysqli_connect_errno() or die(printf (mysqli_connect_error()));
            
            
            mysqli_query($mysqliConnection, "
                CREATE TABLE klienci
                (
                    id INT UNSIGNED AUTO_INCREMENT,
                    imie VARCHAR(20) NOT NULL,
                    nazwisko VARCHAR(30) NOT NULL,
                    login VARCHAR(30) NOT NULL,
                    haslo VARCHAR(15) NOT NULL,
                    wiek TINYINT NULL DEFAULT NULL,
                    ref VARCHAR(100) NULL DEFAULT NULL COMMENT 'Skąd przyszli klienci',
                    PRIMARY KEY(id)
                )") or die(mysqli_error($mysqliConnection));
            
            mysqli_close($mysqliConnection);
        
        ?>
    </body>
</html>



