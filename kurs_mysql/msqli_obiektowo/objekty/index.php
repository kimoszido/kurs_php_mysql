<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>MySQL Pobieranie danych</title>
    </head>
    <body>

<?php

    @$db = new mysqli("localhost", "root", "", "kursmysql2");
    if($db->connect_error)
    {
        echo $db->connect_error;
        exit();
    }

    $db->set_charset("utf8");

    $login = $db->real_escape_string("abcd");

    $query = "
        SELECT * FROM clients
    ";

    $result = $db->query($query) or die($db->error);

    if ($result->num_rows > 0)
    {
        echo "Ilość wierszy: ". $result->num_rows."<br/>";
        while($row = $result->fetch_array(MYSQLI_ASSOC))
        {
            print_r($row);    
            echo "<br/>";
        }
    }
    $result->free();

    $db->close();

?>

    </body>
</html>
