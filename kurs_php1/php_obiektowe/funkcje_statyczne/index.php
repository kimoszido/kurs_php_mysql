<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Funkcje statyczne</title>
    </head>
    <body>

<?php

require_once("class.Guest.php");
require_once("class.User.php");
require_once("class.Moderator.php");
require_once("class.Admin.php");

$g = new Guest();
$u = new User();
$m = new Moderator();
$a = new Admin();


//echo $g::WRITE_POST."<br/>";
//echo Guest::WRITE_POST."<br/>";

//Guest::checkPermission($u->getPermission(), Guest::WRITE_POST);

//echo var_dump($a->isPermitted(PermissionInterface::DELETE_USER));
//echo var_dump(Guest::checkPermission($u->getPermission(), PermissionInterface::WRITE_POST));

//if(!$g->readPost(50))
//    echo "Błąd nie mogę czytać";

//if(!$u->writePost("lala", "aaaaaa"))
//    echo "nie ma mozliwosci pisania";

$tab = array($g, $u, $m, $a);
foreach($tab as $value)
{
    if(!$value->writePost("To jest test", "Topik <br/>"))
        echo "Dany urzytkownik nie może pisać postów <br/>";
}

?>

    </body>
</html>
