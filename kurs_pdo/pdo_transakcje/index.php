<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - Transakcje - Arkadiusz Włodarczyk - videokurs.pl</title>
   
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
            
            $dbh->beginTransaction();
            
            $stmt = $dbh->prepare("UPDATE klienci SET login = 'a' WHERE id = 1");
            
            $stmt->execute();
            
            $stmt->closeCursor();
            
            $stmt = $dbh->prepare("UPDATE klieggnci SET login = 'd' WHERE id = 3");
            
            $stmt->execute();
            
            $stmt->closeCursor();
          
            $dbh->commit();
            
            $dbh = null;
        }
        catch(PDOException $e)
        {
            $dbh->rollBack();
            echo "Error: " . $e->getMessage();
        }
        
      
    ?>
     
    </body>
</html>