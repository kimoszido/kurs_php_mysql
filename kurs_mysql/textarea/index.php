<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Wyszukiwarka, Full Text Index - wiadomości na forum - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>
        <form action="index.php" method="post">
            <div>
                <input type="text" name="searched_words" value="<?php if (isset($_POST['searched_words'])) echo $_POST['searched_words']; else echo ""; ?>" />
                <input type="submit" value="Szukaj" />
            </div>            
        </form>
        <?php   
            if (isset($_POST['searched_words']))
            {
                
                @$mysqliConnection = new mysqli('localhost', 'root', '', 'reservationofrooms');
                !mysqli_connect_errno() or die($mysqliConnection->connect_error);

                $searched_words = mysqli_real_escape_string(@$mysqliConnection, $_POST['searched_words']);
                
                $query = "
                    SELECT c.firstname, p.post_subject, p.post_text FROM clients c JOIN
                    (SELECT post_subject, post_text, poster_id, MATCH(post_text) AGAINST('$searched_words' WITH QUERY EXPANSION) AS trafnosc
                    FROM posts
                    WHERE MATCH(post_text) AGAINST('$searched_words' WITH QUERY EXPANSION) ORDER BY trafnosc DESC) p
                    ON p.poster_id = c.id;
                ";
                /*
                WITH QUERY EXPANSION - najpierw wyszukuję tego co my chcemy a 
                później przeszukuję jeszcze raz przez te artykuły które wyszukało
                IN BOOLEAN MODE - wyszukuję tylko to co chce uzytkownik

                SELECT DISTINCT email FROM klienic WHERE newsletter = 1 AND email IS NOT NULL
                
                DISTINCT - nie powtarza jeżeli są dwa takie same rekordy

                SELECT email FROM
                (SELECT email FROM newsletter_email
                UNION (SELECT  email FROM klienic WHERE newsletter = 1)) AS a
                WHERE email IS NOT NULL ORDER BY e.email
                
                UNION - wyświetla wartości z różnych tabel w jednej kolumnie 
                (domyślnie DICTINCT po wpisaniu UNION ALL wypisuje wszytskie)
                
                 * + - wymaga danego słowa
                 * - - takie słowo nie może istnieć
                 * > - powiększa znaczenie danego słowa
                 * < - zmniejsza znaczenie danego słowa
                 * ~ - zmniejsza znaczenie całego wyszukania (bad words)
                 * "" - to co pomiędzy cudzysłowiami musi wystąpić dokładnie w takiej kolejności i dokładnie tak ;)
                 * () - grupuje słowa, aby móc nadać na parę słów np. >
                 */
                $result = mysqli_query(@$mysqliConnection, $query) or die(@mysqli_error(@$mysqliConnection));


                if (mysqli_num_rows($result) > 0)
                {
                    echo mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<br/>";
                        var_dump($row);
                        echo "<br/>";
                    }
                }

                mysqli_close($mysqliConnection);   
            }
        ?>
        
       
        
     
    </body>
</html>



 