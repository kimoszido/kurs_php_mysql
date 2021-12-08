<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Procedury z parametrami, zmienne i zmienne sesyjne by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
             
            $dbc_h = @mysqli_connect("localhost", "root", "", "kursmysqli") or die(mysqli_connect_error());

            mysqli_set_charset($dbc_h, "utf8");
            
            $query = "
                CALL getTotalOrderAmount(1, @total);
            ";
            
            $result = mysqli_query($dbc_h, $query) or die(mysqli_error($dbc_h));
            
            $query = "
                SELECT @total TotalOrderAmount;
            ";
            
            $result = mysqli_query($dbc_h, $query) or die(mysqli_error($dbc_h));
            
             
            if (mysqli_num_rows($result) > 0)
            {
                echo mysqli_num_rows($result);
                while($row = mysqli_fetch_assoc($result))
                {
                    var_dump($row);
                }
            }

                
            mysqli_close($dbc_h);   
            

        ?>
        
       
        
     
    </body>
</html>



 