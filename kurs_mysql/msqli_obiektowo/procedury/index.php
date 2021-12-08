<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Procedury - tworzenie, modyfikacja, usuwanie, wywoływanie by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
             
            $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysql2") or die(mysqli_connect_error());

            mysqli_set_charset($dbc_h, "utf8");
            
            $login = mysqli_real_escape_string($dbc_h, "abcd");
            
            $query = "CALL pobierzZamowienie(); ";
            
            $result = mysqli_query($dbc_h, $query) or die(mysqli_error($dbc_h));
            
            if (mysqli_num_rows($result) > 0)
            {
                echo mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result))
                {
                    print_r($row);
                    echo "<br/>";
                }
            }
            
            
            mysqli_close($dbc_h);   
            

        ?>
        
       
        
     
    </body>
</html>



 