<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Cursory - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");

          /*
            #DROP PROCEDURE countWordsInPost //
  			CREATE PROCEDURE countWordsInPost()
            BEGIN
                DECLARE more_posts BOOLEAN DEFAULT true;
                DECLARE post_text MEDIUMTEXT;
                DECLARE id INT;
                DECLARE cur_post CURSOR 
                FOR
                    SELECT p.post_id, p.post_text FROM posts p;
                DECLARE CONTINUE HANDLER FOR NOT FOUND
                SET more_posts = false;
                
                CREATE TEMPORARY TABLE post_amount(
                id INT UNSIGNED NOT NULL,
                amountOfPost INT UNSIGNED NOT NULL
                ) ENGINE = Memory CHARSET = utf8;

                OPEN cur_post;
                    read_loop:
                    LOOP
                        FETCH cur_post INTO id, post_text;
                        IF(!more_posts) THEN
                            LEAVE read_loop;
                        END IF;

                        INSERT INTO post_amount (id, amountOfPost) VALUES (id, countWords(post_text, ' '));
                    END LOOP;    
                CLOSE cur_post;
                SELECT * FROM post_amount;
                DROP TABLE post_amount;
            END
            */
  
          $query = "
               CALL countWordsInPost();
          ";
           
          try
          {
              $mq = new MultiQueryArray($dbc_h);

              $result = $mq->multi_query($query, MultiQueryArray::AS_ARRAY);              
              
              print_r($result);
          }
          catch(Exception $e)
          {
              echo $e->getMessage();
          }
         
          mysqli_close($dbc_h);  
        ?>
     
    </body>
</html>



 