<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>PDO - łączenie się z bazami danych - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
    <?php  

        class Customer
        {
            protected $id;
            protected $email;
            protected $login;
            private $cos;
            
            public function __construct($val1, $val2 )
            {
               $this->cos = $val1." !!!!!! ".$val2;
            }
            public function getCustomerInfo()
            {
                return "#$this->id: $this->email, $this->login, cos: $this->cos";
            }
        }
        try
        {
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'",
                PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            $dbh = new PDO("mysql:host=localhost;dbname=kurs_pdo", "root", "", $options);

            $result = $dbh->query("SELECT id, email, login FROM klienci");

            //echo $result->columnCount();
            //echo $result->rowCount();
            /*
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->fetch();
            foreach ($result as $arr)
            {
                foreach ($arr as $key => $value)
                {
                    echo "$key => $value <br/>";
                }
            }
            */
            
            $tmp_arr = array(
                "test",
                "inny"
                
            );
            while ($row = $result->fetchObject("Customer", $tmp_arr))
            {
                echo $row->getCustomerInfo()."<br />";
            }
            
            $result->closeCursor();
            
            $dbh = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    ?>
     
    </body>
</html>