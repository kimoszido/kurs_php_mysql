<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>tablice</title>
    </head>
    <body>

<?php

    $cytaty = array(
        "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
        "bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb",
        "ccccccccccccccccccccccccccccccc"
    );

    $random_number = rand(0, count($cytaty) - 1);

    echo $cytaty[$random_number];

?>

    </body>
</html>