<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Transakcje - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
             
            require_once("MultiQueryArray.php");
            $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

            mysqli_set_charset($dbc_h, "utf8");
            
            $query = "
               SET @blabla = 4; CALL getTotalOrderAmount(1, @total); UPDATE klienci SET login = 'adgasdg' WHERE id = 1; UPDATE klienci SET login = 'asdgasd' WHERE id = 2;  SELECT * FROM zamowienia; SELECT @total TotalOrderAmount; SELECT @blabla;
            ";
           
            
        /*    mysqli_query($dbc_h, "START TRANSACTION");
            $result = mysqli_query($dbc_h, "INSERT INTO test (tekst) VALUES ('tralala')");
            //mysqli_insert_id($dbc_h);
            
             //przetwarzanie danych z $result
             
             
            
            $ok = mysqli_query($dbc_h, "DELETE FROM test");
            
            if (!$ok)
                mysqli_rollback($dbc_h);
            else                 
                mysqli_commit($dbc_h);
                */

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



 