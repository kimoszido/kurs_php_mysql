<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php


    $readPost = 1;
    $writePost = 2;
    $deletePost = 4;
    $deleteUser = 8;

    $guest = $readPost;
    $user = $writePost | $readPost;
    $moderator = $writePost | $readPost | $deletePost;
    $admin = $readPost | $writePost | $deletePost | $deleteUser;

    /*
        0 0 0 0 0 0 0
        0 0 0 0 0 0 1 - czytanie
        0 0 0 0 0 1 0 - pisanie
        0 0 0 0 0 1 1 - czytanie i pisanie
        0 0 0 0 1 0 0 - usuwanie postów
        0 0 0 1 0 0 0 - usuwanie użytkowników

    */
    if (chcckPermission ($admin, $writePost)){
       writePost ("Cześć jestem tu mistrzem");
    }

    if (chcckPermission ($guest, $writePost)){
        writePost ("guest napisz post");
    }
    

    function writePost ($contentOfPost){
        echo $contentOfPost;
    }

    function chcckPermission ($user, $permission)
    {
        if($user & $permission)
            return true;

            return false;
    }



?>

    </body>
</html>