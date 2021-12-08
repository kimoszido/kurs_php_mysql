<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - łączenie się z bazami danych - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
    <?php   
        try
        {
            //var_dump(PDO::getAvailableDrivers());
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            $dbh = new PDO("mysql:host=localhost;dbname=kurs_pdo", "root", "", $options);
            
            /*
            $dbh = new PDO("sqlite:nasza_baza_danych.sqlite");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            */

            
            $dbh->query("SELECT * FROM klienci");
            
            
            $dbh = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    ?>
     
    </body>
</html>