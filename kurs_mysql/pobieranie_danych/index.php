<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>MySQL Pobieranie danych</title>
    </head>
    <body>

<?php

    $mysqlConnection = new mysqli("localhost", "root", "", "kursmysql");
    !mysqli_connect_errno() or die(mysqli_error($mysqlConnection));

    mysqli_set_charset($mysqlConnection, "utf8");

    $query = "
        SELECT * FROM klienci1
    ";

    $result = mysqli_query($mysqlConnection, $query) or die(mysqli_error($mysqlConnection));

    //print_r($result);

    if (mysqli_num_rows($result) > 0)
    {
        echo "Ilość wierszy: ". mysqli_num_rows($result)."<br/>";
        echo "Ilość pól: ". mysqli_num_fields($result)."<br/>";

        //$row = mysqli_fetch_array($result, MYSQLI_ASSOC); //MYSQLI_ASSOC - tablice asocjacyjne , MYSQL_NUM - tablice numeryczne

        /*
        $row = mysqli_fetch_assoc($result); //MYSQLI_ASSOC
        //$row = mysqli_fetch_row($result); //MYSQLI_NUM

        echo "<pre>";
        print_r($row);
        echo "<pre/>";

        $row1 = mysqli_fetch_assoc($result); //MYSQLI_ASSOC
        //$row1 = mysqli_fetch_row($result); //MYSQLI_NUM

        echo "<pre>";
        print_r($row1);
        echo "<pre/>";
        */
        /*
        while($row = mysqli_fetch_assoc($result))
        {
            echo "<table border='1' cellspacing='0' style='float: left; margin: 10px;'>";
            echo "<tr><td>Id: ".$row['id']."</td></tr>";
            echo "<tr><td>Login: ".$row['login']."</td></tr>";
            echo "<tr><td>Hasło: ".$row['haslo']."</td></tr>";
            echo "<tr><td>Imię: ".$row['imie']."</td></tr>";
            echo "<tr><td>Nazwisko: ".$row['nazwisko']."</td></tr>";
            echo "<tr><td>Wiek: ".$row['wiek']."</td></tr>";
            echo "<tr><td>Ref: ".$row['ref']."</td></tr>";
            echo "</table>";
        }
        */

        /*for ($i = 0; $i < mysqli_num_rows($result); $i++)
        {
            $row = mysqli_fetch_assoc($result);
            echo "<table border='1' cellspacing='0' style='float: left; margin: 10px;'>";
            echo "<tr><td>Id: ".$row['id']."</td></tr>";
            echo "<tr><td>Login: ".$row['login']."</td></tr>";
            echo "<tr><td>Hasło: ".$row['haslo']."</td></tr>";
            echo "<tr><td>Imię: ".$row['imie']."</td></tr>";
            echo "<tr><td>Nazwisko: ".$row['nazwisko']."</td></tr>";
            echo "<tr><td>Wiek: ".$row['wiek']."</td></tr>";
            echo "<tr><td>Ref: ".$row['ref']."</td></tr>";
            echo "</table>";                    
        }*/

        for ($i = 0; $i < mysqli_num_rows($result); $i++)
        {
                $row = mysqli_fetch_assoc($result);
                echo "<table border='1' cellspacing='0' style='float: left; margin: 10px;'>";
                foreach($row as $key => $value)
                {
                    if ($key == 'haslo')
                        continue;
                    echo "<tr><td>".ucfirst($key).": $value</td></tr>"; //ucfirst - Pierwsza litera duża (upper case first)
                }
                echo "</table>";                     
        }

        /*
        $obj = mysqli_fetch_object($result);        
        echo $obj->imie;
        */
    }

    mysqli_close($mysqlConnection);

?>

    </body>
</html>
