<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        
        <title>Zmienna $_FILES</title>
    </head>
    <body>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <input type="hidden" name="MAX_FILE_SIZE" value="30720">
                <input type="file" name="plik">
                <input type="submit" value="DOdaj plik">
            </div>
        </form>

<?php

    if(isset($_FILES['plik']))
    {
        
        switch($_FILES['plik']['error'])
        {
            case 0;
                if($_FILES['plik']['type'] == "image/jpeg" || $_FILES['plik']['type'] == "image/gif" || $_FILES['plik']['type'] == "image/png")
                {
                    $directory = "C:/xampp/htdocs/kurs_php1/files/img/".md5(rand()*rand()+rand()).$_FILES['plik']['name'];
                    $name_tmp = $_FILES['plik']['tmp_name'];
                    move_uploaded_file($name_tmp, $directory);
                    echo "Plik został pomyślnie zuploadowany";
                }
                else
                {
                    echo "Niedozwolone rozszerzenie pliku";
                }
                break;

                //OBSŁUGA BŁĘDÓW
            case 1;
                echo "Za duży plik (php.ini)";
                break;
            case 2;
                echo "Za duży plik ";
                break;
            case 3;
                echo "Niepełny plik";
                break;
            case 4;
                echo "Nie wybrano pliku";
                break;
            default:
                echo "Błąd którego nie przewidziano prosimy o kontakt";
        }
        
    }


?>

    </body>
</html>
