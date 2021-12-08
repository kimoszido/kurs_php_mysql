<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Wielokrotne instrukcje w zapytaniu - multi_query by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
             
            require_once("MultiQueryArray.php");
            $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

            mysqli_set_charset($dbc_h, "utf8");
            
            $query = "
               SET @blabla = 4; CALL getTotalOrderAmount(1, @total); SELECT * FROM zamowienia; SELECT @total TotalOrderAmount; SELECT @blabla;
            ";
           
            
         //   $query = "SELECT 5,10,15; UPDATE klienci SET login = 'najeszczeinny' WHERE id = 1; SELECT 40; SELECT 100;";
            

            function processQueryAsArray($result)
            {
                echo "test";
            }            


          try
          {
              $mq = new MultiQueryArray($dbc_h);

              $result = $mq->multi_query($query, MultiQueryArray::AS_ARRAY);
              //$result = $mq->multi_query("SELECT * FROM zamowienia;", 'processQueryAsArray');

              for ($i = 0; $i< $mq->getNumberOfQueries();$i++)
              {
                  $result = $mq->getQueryResultSet($i);
                  print_r($result);
                  echo "<br/>";
              }
              mysqli_close($dbc_h);   
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
            

        ?>
        
       
        
     
    </body>
</html>



 