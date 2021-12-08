<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Procedury z instrukcjami warunkowymi - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   

          require_once("MultiQueryArray.php");
          $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

          mysqli_set_charset($dbc_h, "utf8");
          
            
            /*
            //TWORZENIE PROCEDURY z IF
            /////////////////////////////////////////////////////////
            CREATE PROCEDURE getAmountOfEmails(IN isDistinct BOOLEAN)
            BEGIN
            DECLARE totalEmails INT DEFAULT 0;
            IF(isDistinct) THEN
                SELECT COUNT(DISTINCT email) INTO totalEmails FROM newsletter_emails;
            ELSEIF(!isDistinct) THEN
                SELECT COUNT(email) INTO totalEmails FROM newsletter_emails;
            ELSE
                SET totalEmails = 0;
            END IF;

            SELECT totalEmails;

            END

            //TWORZENIE PROCEDURY z CASE
            /////////////////////////////////////////////////////////
            CREATE PROCEDURE getAmountOfEmails(IN isDistinct BOOLEAN)
            BEGIN
            DECLARE totalEmails INT DEFAULT 0;
            CASE
            WHEN(isDistinct) THEN
                SELECT COUNT(DISTINCT email) INTO totalEmails FROM newsletter_emails;
            WHEN(!isDistinct) THEN
                SELECT COUNT(email) INTO totalEmails FROM newsletter_emails;
            ELSE
                SET totalEmails = 0;
            END CASE;

            SELECT totalEmails;

            END
            */

            /*
            //JAK SQL INTERPRETUJE TRUE I FALSE
            //////////////////////////////////////////////////////////////////////////////////
            * TRUE - true, wartości różne od 0
            * FALSE - false, 0, 'tekst'
            * ANI TRUE ANI FALSE - NULL 
            */
          $query = "
             CALL getAmountOfEmails(1);
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



 