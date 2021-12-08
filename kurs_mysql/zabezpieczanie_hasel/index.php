<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Podstawy MySQL</title>
    </head>
    <body>

<?php

    @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
    !mysqli_connect_errno() or die($mysqliConnection->connect_error);


    $salt = "3872gyrufbew87SASDJS3qg48f2uihp9wqy38hf?>:@#!>#@{!#^%@(DFEWHAU%#@^$#@$(@#KUHDAA}";
    //$query = "UPDATE klienci_sha512_z_sola SET haslo = SHA2(CONCAT('$salt',haslo), 512)";

    //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    /*
    $login = mysqli_real_escape_string($mysqliConnection, "login");
    $pw = "sadasd2d31##";

    $pw = hash("sha512", $salt.$pw);
    //$query = "INSERT INTO klienci_sha512_z_sola (login, haslo) VALUE ('$login', '$pw')";
    //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    $query = "SELECT haslo FROM klienci_sha512_z_sola WHERE login = '$login' AND haslo = '$pw'";

    $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));  

    if(mysqli_num_rows($result) > 0)
    {
        $result = mysqli_fetch_assoc($result);
        echo $result['haslo'];
    }
    */

    //ZAMIAN Z MD5 NA SHA512 z SOLĄ

    //$query = "UPDATE klienci_z_md5_zmiana_sha512_z_sola1 SET haslo = SHA2(CONCAT('$salt',haslo), 512)";
    //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    $login = mysqli_real_escape_string($mysqliConnection, "login");
    $pw = "sadasd2d31##";

    $pwSha512Md5 = hash("sha512", $salt.md5($pw));

    $pwSha512 = hash("sha512", $salt.$pw);
    //$query = "INSERT INTO klienci_z_md5_zmiana_sha512_z_sola1 (login, haslo) VALUE ('$login', '$pw')";
    //mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));

    
    $query = "SELECT haslo, is_pw_changed FROM klienci_z_md5_zmiana_sha512_z_sola1 WHERE login = '$login'";
    $result = mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
      
    if(mysqli_num_rows($result) > 0)
    {
        $result = mysqli_fetch_assoc($result);
        echo $result['haslo']."<br/>";

        if( $pwSha512 == $result['haslo'])
        {
            //LOGOWANIE
            echo "Zalogowano sha512<br/>";
        }
        else if (!$result['is_pw_changed'])
        {
            $pwSha512Md5 = hash("sha512", $salt.md5($pw));

            if($pwSha512Md5 == $result['haslo'])
            {
                $query = "UPDATE klienci_z_md5_zmiana_sha512_z_sola1 SET haslo = '$pwSha512', is_pw_changed = 1 WHERE login = '$login'";
                mysqli_query($mysqliConnection, $query) or die(mysqli_error($mysqliConnection));
                //LOGOWANIE
                echo "Zalogowano sha512 md5<br/>";
            }
            else
            {
                echo "Błędne hasło lub login";
            }
        }
        else
        {
            echo "Błędne hasło lub login";
        }
        echo $result['haslo'];
    }
    
    

    mysqli_close($mysqliConnection);
    
?>

    </body>
</html>
