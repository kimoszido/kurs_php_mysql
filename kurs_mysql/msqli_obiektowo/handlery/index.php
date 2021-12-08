<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Handlery i Conditions, SIGNAL - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");

          /*
          ////////////
            CREATE PROCEDURE test(IN num INT)
            BEGIN

            DECLARE table_exists CONDITION FOR SQLSTATE'42S01';
            DECLARE division_by_zero CONDITION FOR SQLSTATE '99999';
            DECLARE CONTINUE HANDLER FOR table_exists 
                SET @errMsg = 'tralala';
            DECLARE CONTINUE HANDLER FOR division_by_zero
            BEGIN
                SET @errMsg2 = 'a';
                SET @errMsg3 = 'b';
            END;

            CREATE TABLE `klienci` (
            `id` int(10) UNSIGNED NOT NULL,
            `email` varchar(80) DEFAULT NULL,
            `login` varchar(200) NOT NULL,
            `haslo` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
            `imie` varchar(20) NOT NULL,
            `nazwisko` varchar(30) NOT NULL,
            `wiek` tinyint(3) UNSIGNED DEFAULT NULL,
            `ref` varchar(100) DEFAULT NULL COMMENT 'Skąd klient przyszedł',
            `newsletter` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Czy zapisany do newslettera',
            `register_time` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            CREATE TABLE `klienci2` (
            `id` int(10) UNSIGNED NOT NULL,
            `email` varchar(80) DEFAULT NULL,
            `login` varchar(200) NOT NULL,
            `haslo` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
            `imie` varchar(20) NOT NULL,
            `nazwisko` varchar(30) NOT NULL,
            `wiek` tinyint(3) UNSIGNED DEFAULT NULL,
            `ref` varchar(100) DEFAULT NULL COMMENT 'Skąd klient przyszedł',
            `newsletter` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Czy zapisany do newslettera',
            `register_time` timestamp NOT NULL DEFAULT current_timestamp()
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

            IF (num != 0) THEN
                SET @wynik = 10 / num;
            ELSE
                SIGNAL division_by_zero SET MESSAGE_TEXT = 'nie dzielimy przez zero';
            END IF;
            END
            */
  
          $query = "
              CALL test(5);
              SELECT @errMsg,@errMsg2,@errMsg3, @wynik;
              
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



 