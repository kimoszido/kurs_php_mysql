<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - Last Insert Id - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
    <?php  

        try
        {                   
            $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
                    PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
                );
            $dbh = new PDO("mysql:host=localhost;dbname=kurs_pdo", "root", "vertrigo", $options);
            
            $stmt = $dbh->prepare("INSERT INTO klienci (email, login)
                VALUES
                ('jakistam', 'jakistam@com.pl')                
            ");
                    
            $stmt->execute();
            $id_klienta = $dbh->lastInsertId();
            
            $stmt->closeCursor();           
            
            
            $stmt = $dbh->prepare("INSERT INTO zamowienia (id_klienta, kwota_zamowienia)
                VALUES
                ($id_klienta, 45)                
            ");
                    
            $stmt->execute();
      
            $stmt->closeCursor();            
            
            $dbh = null;
        }
        catch(PDOException $e)
        {         
            echo "Error: " . $e->getMessage();
        }
        
      
    ?>
     
    </body>
</html>