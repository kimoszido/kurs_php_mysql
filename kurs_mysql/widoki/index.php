<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql2');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);

            /**
             * CREATE VIEW widok_zamowien2
                AS
                SELECT zp.id_zamowienia, c.email, sum(zp.ilosc), p.nazwa, sum(zp.ilosc*zp.cena_za_szt), z.data_zamowienia
                FROM zamowione_produkty zp 
                JOIN zamowienia z
                ON zp.id_zamowienia = z.id 
                JOIN clients c
                ON c.id = z.id_klienta   
                JOIN produkty p
                ON p.id = zp.id_produktu
                GROUP BY zp.id_zamowienia, zp.id_produktu
             */
            
            $query = "SELECT kwota FROM widok_zamowien WHERE id_zamowienia = 1";
            
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



 