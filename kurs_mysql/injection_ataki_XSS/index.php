<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Podstawy MySQL</title>
    </head>
    <body>

<?php

    require_once ('htmlpurifier\library\HTMLPurifier.auto.php');
    $purifier = new HTMLPurifier(); 

    function clear (&$str)
    {
        global $mysqliConnection;
        if(filter_var($str, FILTER_SANITIZE_STRING))
        {
            $str = stripslashes($str);
        }
        $str = mysqli_real_escape_string($mysqliConnection, $str);
        return $str;
    }


    @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
    !mysqli_connect_errno() or die($mysqliConnection->connect_error);

    $login = "kimoszido";
    $haslo = clear ($_GET['haslo']);
    
    /*
    $query = pg_prepare($mysqliConnection, "" , "SELECT id, nazwisko FROM klienci1 WHERE login = '$login' AND haslo = '$haslo'");
    $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
    */

    $var = "<script>alert('test')</script>";

    $query = "SELECT id, login From klienci1";
    $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    //$query = "INSERT INTO klienci1 (login) VALUE (\"$var\")";
    //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            foreach($row as $key => $value)
            {
                //echo  "$key ".htmlspecialchars($value)."<br/>";
                //echo  "$key ".filter_var($value, FILTER_SANITIZE_STRING)."<br/>";
                echo  "$key ".$purifier->purify($value)."<br/>";
            }
        }
    }    
    
    mysqli_close($mysqliConnection);
    
?>

    </body>
</html>
