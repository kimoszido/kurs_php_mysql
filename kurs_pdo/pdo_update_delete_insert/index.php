<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - aktualizacja, usuwanie, dodawanie rekordów, quoting - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
    <?php  

        try
        {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            $dbh = new PDO("mysql:host=localhost;dbname=kurs_pdo", "root", "", $options);
            
            $dana_z_zewnatrz = "cos zlego' afssdf ";
            $dana_z_zewnatrz = $dbh->quote($dana_z_zewnatrz);
            
            $result = $dbh->exec("INSERT INTO produkty (nazwa,cena) 
                    VALUES ($dana_z_zewnatrz, 20)");
            
            echo $result;
            
           // $result->closeCursor();
            
            $dbh = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    ?>
     
    </body>
</html>