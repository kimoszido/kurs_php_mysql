<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - prepared statements - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
    <?php  

        try
        {
            class Klient
            {
                
                public $email;
                public $login;
                
                public function __construct($email, $login)
                {
               
                    $this->email = $email;
                    $this->login = $login;
                }
                        
            }
            
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            $dbh = new PDO("mysql:host=localhost;dbname=kurs_pdo", "root", "", $options);
            
            
  
            //placeholder - zamiennikami, zastępcze elementy
            

            $stmt = $dbh->prepare("INSERT INTO klienci (email, login) VALUES (:email, :login)");
             
            $email = "test@abc.pl";
            $login = "gosasgasdgcff";    
            
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
            $stmt->bindParam("login", $login, PDO::PARAM_STR);
            $stmt->execute();
          /*  $klient = new Klient("mail1@com.pl", "jakisloginss");
            $stmt->execute((array)$klient);
            $klient = new Klient("testasfasf@abc.pl", "jakisloginssggg");
            $stmt->execute((array)$klient);
           */
            echo $stmt->queryString."<br />";
            
     
            
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