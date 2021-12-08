<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Podstawy MySQL</title>
    </head>
    <body>

<?php


    //mysql_connect("nazwa_serwera:port", "login", "haslo")
    @$mysqliConnection = new mysqli('localhost', 'root', '', 'kursmysql');
    !mysqli_connect_errno() or die($mysqliConnection->connect_error);

    
    
?>

    </body>
</html>
