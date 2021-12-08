<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Triggery - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");
          /*
           * CREATE TRIGGER trigger_name trigger_time trigger_event 
           * ON tbl_name FOR EACH ROW trigger_stmt
           * 
           * trigger_time: AFTER, BEFORE
           * trigger_event: INSERT, DELETE, UPDATE
           * 
           * 
            CREATE TRIGGER au_zamowienia AFTER UPDATE
            ON zamowione_produkty FOR EACH ROW
            BEGIN
                DECLARE kwota DECIMAL (8,2);
                SELECT sum(ilosc*cena_za_szt) INTO kwota FROM zamowione_produkty 
                WHERE id_zamowienia = old.id_zamowienia
                GROUP BY id_zamowienia;
                
                UPDATE zamowienia SET kwota_zamowienia = kwota WHERE id = old.id_zamowienia;
            END
           */
          $query = "
             
          ";
           
          try
          {
              $mq = new MultiQueryArray($dbc_h);

              $result = $mq->multi_query($query, MultiQueryArray::AS_ARRAY);              
              
              var_dump($result);
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
         
          mysqli_close($dbc_h);  
        ?>
     
    </body>
</html>



 