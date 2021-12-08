<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Wysyłanie e-maili - by Arkadiusz Włodarczyk - videokurs.pl</title>

    </head>
    <body>
        <?php
            $do    = "adam.bialik95@gmail.com";
            $temat = "Temat wiadomości";
            $tresc = "<b>Testowy</b> e-mail do $do o treśći\n<br />".
                     "Tekst w następnej lini\n".
                     "Jeszcze jedna linia";
            $tresc = wordwrap($tresc, 70);
            $tresc = str_replace("\n.", "\n..", $tresc);
            
            $naglowki = "Content-type: text/html; charset=UTF8\r\n".
                        "From: "."naszemail@domena.pl"."\r\n".
                        "Reply-to: "."naszemail@domena.pl"."\r\n";
            
            
            mail($do, $temat, $tresc, $naglowki);
            
            //text/html

            //MASOWE WYSYŁANIE MAILI
            //videokurs.pl/artykuly/php/skrypt-masowego-mailingu.php
                   
        ?>
    </body>
</html>