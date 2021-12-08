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
          //STWORZENIE FUNKCJI z PETLA WHILE
            CREATE FUNCTION countWords (inputString MEDIUMTEXT, delim CHAR(1))
            RETURNS INT
            DETERMINISTIC
            BEGIN
                DECLARE i INT DEFAULT 0;
                DECLARE amountOfWords INT DEFAULT 1;
                DECLARE ch CHAR(1);
                DECLARE prevCh CHAR(1);
                
                SET inputString = TRIM(inputString);
                
                IF(inputString = '' OR inputString = NULL) THEN
                    SET amountOfWords = 0;
                END IF;
                
                loop_label:
                WHILE i < LENGTH(inputString) DO
                    SET i = i + 1;
                    SET ch = SUBSTRING(inputString, i, 1);
                    
                    IF(prevCh = delim AND ch = delim) THEN
                        ITERATE loop_label;
                    END IF;
                    
                    IF(ch = delim) THEN
                        SET amountOfWords = amountOfWords + 1;
                    END IF;
                    SET prevCh = ch;
                END WHILE;
                RETURN amountOfWords;
            END

            ///////PĘTLA REPEAT UNTIL
            REPEAT
            ...
            ...
            ...
            UNTIL (warunek) - gdy warunek będzie spełniony wyjdzie z pętli
            END REPEAT

            //////////PETLA LOOP
            loop_label
            LOOP
            IF (warunek) THEN    - Jeżeli warunek jest spełnony to wyjdzie z pętli
                LEAVE loop_label
            END IF;
            END LOOP



            */
          //
          $query = " 
             SELECT countWords('TO,jest, przykl,adowy tek,st', ',');
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



 