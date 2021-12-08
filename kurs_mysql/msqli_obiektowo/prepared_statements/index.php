<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Prepared statements - Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
   
        <?php   

          require_once("MultiQueryArray.php");
          $mysqli = new mysqli("localhost", "root", "", "kursmysqli2");

          if (mysqli_connect_errno()) 
          {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
          }
          $mysqli->set_charset("utf8");
    

          //placeholder
          $query = "
             SELECT id, email, login FROM klienci WHERE id = ? 
          ";
          
          if ($stmt = $mysqli->prepare($query))
          {          
              //$name - s, $energy - i $max_energy - i                  d - double, b - binary
              $stmt->bind_param("i", $id);

              $id = 3;
              $stmt->bind_result($id, $email, $login);
           

              $stmt->execute();

              while($stmt->fetch())
                echo "$id, $email, $login<br />";

              $stmt->close();
          }

          $query = "
             INSERT INTO players (name, energy, max_energy) VALUE (?,?,?);
          ";
          
          if ($stmt = $mysqli->prepare($query))
          {          
              //$name - s, $energy - i $max_energy - i                  d - double, b - binary
              $stmt->bind_param("sii", $name, $energy, $max_energy);

              //$stmt->bind_result($name, $energy, $max_energy);
           
              for($i = 0; $i < 10; $i++)
              {
                $name = 'adam';
                $energy = $i * 10;
                $max_energy = $i * 20;
                $stmt->execute();
              }

              $stmt->close();
          }
          /*
      
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
       */
          $mysqli->close();  
        ?>
     
    </body>
</html>



 