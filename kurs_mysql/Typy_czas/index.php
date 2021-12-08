<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php
/*  
    *   YEAR - 1 bajt zakres: 1901 - 2155; format YYYY lub YY
    *   DATE - 3 bajty; format: YYYY-MM-DD 
    *   DATETIME - 8 bajtów: format: YYYY-MM-DD hh:mm:ss - od 1000 do 9999 roku
    *   TIMESTAMP - 4 bajty: format: YYYY-MM-DD hh:mm:ss - możliwe wartości tylko większe od początku epoki unixowej
    *   TIME - 3 bajty; zakres od -839:59:59 do plus 839:59:59
    * 
    *   LEGENDA FORMATOWANIA:
    *   Y - rok (year)
    *   M - miesiąc (month)
    *   D - dzień (day)
    *   h - godzina (hour)
    *   m - minute (minuta)
    *   s - sekunda (second)
    * 
    * FUNKCJE:
    * http://dev.mysql.com/doc/refman/5.5/en/date-and-time-functions.html#function_makedate
    *    NOW() - aktualna data i czas
    *    CURDATE() - aktualna data
    *    CURTIME() - aktualny czas (przy INSERT działa tylko z TIME)
    *    DATE(dana_czasowa) - zwraca tylko datę
    *    EXTRACT(Jednostka FROM dana_czasowa) - wyciąga jednostkę z dana_czasowa np. MONTH
    *    DATE_ADD(dana_czasowa, INTERVAL ilość Jednostka) - dodaje do dana_czasowa ilość Jednostka
    *    DATE_SUB(dana_czasowa, INTERVAL ilość Jednostka) - odejmuje od dana_czasowa ilość Jednostka
    * 
    *    DATEDIFF(dana_czasowa1, dana_czasowa2) - zwraca (dana_czasowa1 - dana_czasowa2) w dniach
    *    DATE_FORMAT(dana_czasowa, wzór) - formatuje w inny sposób wygląd danej_czasowej
    * 
    *    MAKEDATE(rok, dzien_w_roku) - można użyć MAKEDATE(rok, DAYOFYEAR(dana_czasowa)), dana_czasowa np. '1989-09-01'
    * 
    *    UNIX_TIMESTAMP - mysql_version TIMESTAMP to time() potrzebne do formatowania daty w php
    *    FROM_UNIXTIME - time() do mysql_version TIMESTAMP
    * 
    *    epoka unixowa zaczyna się od:
    *    1970-01-01 00:00:00 
*/

    @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
    !mysqli_connect_errno() or die($mysqliConnection->connect_error);

    $query = "SELECT UNIX_TIMESTAMP(timestamp) AS data FROM czas;";
    //SELECT NOW() AS aktualnaData
    //INSERT INTO czas (name, year, date, datetime, timestamp, time) VALUE ('NOW', 1990, '1990-01-01', '1990-01-01 12:12:12', '1990-01-01 13:13:13', '11:11:11');
    //INSERT INTO czas (year, date, datetime, timestamp, time) VALUE (NOW(), NOW(), NOW(), NOW(), NOW());
    //INSERT INTO czas (nazwa, year, date, datetime, timestamp, time) VALUE ('CURRENT_DATE', CURRENT_DATE(), CURDATE(), CURDATE(), CURDATE(), CURDATE());
    //INSERT INTO czas (nazwa, year, date, datetime, timestamp, time) VALUE ('CURRENT_TIME', CURTIME(), CURTIME(), CURTIME(), CURTIME(), CURTIME());
    //SELECT DATE(timestamp) AS data, time AS czas FROM czas
    //SELECT timestamp FROM czas WHERE timestamp > DATE('2011-09-20')
    //SELECT creation FROM czas WHERE creation > DATE_SUB(NOW(), INTERVAL 10 DAY)
    //SELECT UNIX_TIMESTAMP(timestamp) AS data FROM czas
    //SELECT DATE_FORMAT(timestamp, '%M %D %Y') AS data FROM czas;
    $result = mysqli_query($mysqliConnection, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_assoc($result))
                {
                    foreach($row as $key => $value)
                    {
                        echo "$key:  ".date("Y-m-d H:i:s",$value)." <br />";
                        //echo "$key:  $value <br />";
                    }
                }

    }


    mysqli_close($mysqliConnection);



?>

    </body>
</html>
