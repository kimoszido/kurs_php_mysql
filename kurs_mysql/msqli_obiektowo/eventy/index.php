<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Eventy - zdarzenia planowane i powtarzające się - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli2") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");
          /*
           * SELECT @@event_scheduler; - sprawdzenie czy event scheduler jest włączony
           * 
           * SET GLOBAL event_scheduler = 1; - włączenie event schedulera 
           * 
           * CREATE EVENT event_name
           * ON SCHEDULE
           *  AT timestamp
           * DO
           *  sql_statement;
           * 
           * CREATE EVENT event_name
           * ON SCHEDULE
           *  EVERY amount
           *    {SECOND|MINUTE|HOUR|DAY|MONTH|YEAR|WEEK}
           * DO
           *  sql_statement;* 
           * 
           * CREATE EVENT event_name
           * ON SCHEDULE {EVERY|AT}...
           * 
           * [ON COMPLETION [NOT] PRESERVE]
           * [STARTS {timestamp}] // kiedy ma sie rozpoczęć wykonywać np STARTS now() + INTERVAL 10 SECOND
           * [ENDS {timestamp}] // kiedy ma sie zakonczyc wykonaywac np END now() + INTERVAL 60 SECOND
           * 
           * DO
           *    sql_statement;
           *
           * /////////PRZYKŁADY
           * 
           *DROP EVENT IF EXISTS update_energy //
            CREATE EVENT 
            update_energy
            ON SCHEDULE
                EVERY
                    5 SECOND
                DO
                BEGIN
                    UPDATE players SET energy = energy + 1 WHERE energy < max_energy;
                END
           * 
           *DROP EVENT IF EXISTS update_energy //
            CREATE EVENT 
            update_energy
            ON SCHEDULE
                AT
                    TIMESTAMP '2022-01-26 19:20:12'
                ON COMPLETION PRESERVE // po wykonaniu nie zniknie z bazy danych
                DO
                BEGIN
                    UPDATE players SET energy = energy + 100 WHERE energy < max_energy;
                END
           * 
           * 
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



 