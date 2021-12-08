<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Indeksy i indeksy złożone - testy szybkości - by Arkadiusz Włodarczyk - videokurs.pl</title>
   
    </head>
    <body>

        <?php   
            @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql2');
            !mysqli_connect_errno() or die($mysqliConnection->connect_error);
            
            //ZAOKRĄGLENIE
            $query = "SELECT  round(kwota, 1) FROM zamowienia";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            //POTĘGA
            $query = "SELECT power(kwota, 2) FROM zamowienia";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            //DLUGOSC
            $query = "SELECT  length(firstname) dl_loginu FROM clients";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            //DUŻE LITERY male - lcase
            $query = "SELECT  ucase(firstname) dl_loginu FROM clients";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            //usun spacje z przodu i ztyłu tylko na końcu - rtrim  na początku ltrim
            $query = "SELECT  trim(firstname) dl_loginu FROM clients";
            $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

            /**
             * lista funkcji:
             * NUMERYCZNE
             * https://dev.mysql.com/doc/refman/8.0/en/numeric-functions.html
             * 
             * STRINGI
             * https://dev.mysql.com/doc/refman/8.0/en/string-functions.html
             * 
             * POZOSTAŁE
             * https://dev.mysql.com/doc/refman/8.0/en/built-in-function-reference.html
             */
            
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



 