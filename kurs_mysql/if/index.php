<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql2');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);

            //IF(warunek, co ma sie pojawic jezeli prawda, co ma sie pojawic jezeli fałsz)
            /**
             * SELECT(
             * SELECT COUNT(newsletter) 
             * FROM clients WHERE newsletter = 1) zapisani, (
             * SELECT COUNT(newsletter) 
             * FROM clients WHERE newsletter = 0) niezapisani
             * 
             * SELECT sum(IF(newsletter = 0, 1, 0)) niezapisani, sum(IF(newsletter = 1, 1, 0)) zapisani 
             * FROM clients
             * 
             * SELECT IF(email, email, 'Brak') email FROM clients
             * 
             * SELECT email, wiek FROM clients WHERE wiek IN (20, 44)
             * 
             * SELECT email, wiek FROM clients WHERE wiek NOT IN (20)
             * 
             * SELECT id, email, firstname FROM clients WHERE id IN 
                (SELECT id_klienta FROM zamowienia WHERE id IN
                (SELECT id_zamowienia FROM zamowione_produkty 
                GROUP BY id_zamowienia HAVING sum(ilosc*cena_za_szt) > 860))
             */
            
            $query = "SELECT newsletter FROM widok_zamowien WHERE id_zamowienia = 1";
            
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
            
    
            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    foreach($row as $key => $value)
                    {
                        echo  "$key => $value)<br/>";
                    }
                }
            }    
        ?>
        
       
        
     
    </body>
</html>



 