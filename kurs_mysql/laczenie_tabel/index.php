<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php 

            @$mysqliConnection = new mysqli('localhost', 'root', '', 'reservationofrooms');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);
            //nawiasy mówią że to jest jedna tabela dlatego może my połączyć ją z następną 
            $query = "SELECT r.id_reservation, r.dateOfReservation, c.id, c.firstname
            FROM (reservations r LEFT JOIN clients c ON c.id = r.id_reservation)";
            
            /*
            SELECT r.id_reservation, r.dateOfReservation, c.id, c.firstname
            FROM clients AS c, reservations AS r WHERE c.id = r.id_client
            */

            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
    
            if(mysqli_num_rows($result) > 0)
            {
                echo mysqli_num_rows($result)."<br/>";
                while($row = mysqli_fetch_assoc($result))
                {
                    print_r($row);
                    echo "<br/>";
                }
            }
            
            mysqli_close($mysqliConnection);        
        ?>
        
       
        
     
    </body>
</html>



 