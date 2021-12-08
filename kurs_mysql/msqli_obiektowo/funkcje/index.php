<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Funkcje - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");
  
          /*
          ///////////////////////////////////////////////////////////////////////////
          //STWORZENIE FUNKCJI
            CREATE FUNCTION randomValuesBetween(min INT, max INT)
            RETURNS INT
            BEGIN
                IF(min > max) THEN
                RETURN NULL;
                END IF;
                RETURN FLOOR(RAND()*(max-min+1) + min);
            END
            */
          //(3,5)
          $query = "
             #SELECT randomValuesBetween(3, 7);
             
             SET @ID = randomValuesBetween(1, (SELECT MAX(post_id) FROM posts));
             
             SELECT * FROM posts WHERE post_id >= @ID LIMIT 1;
          ";
           
          try
          {
              $mq = new MultiQueryArray($dbc_h);

              $result = $mq->multi_query($query, MultiQueryArray::AS_DUMP);              
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
         
          mysqli_close($dbc_h);  
        ?>
     
    </body>
</html>



 