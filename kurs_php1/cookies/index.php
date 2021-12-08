<?php
    session_start(); //$_SESSION['nazwa'] = wartosc;

    if(isset($_GET['ref']))
    {
        $ref = filter_var($_GET['ref'], FILTER_SANITIZE_STRING);
        
        if (!isset($_COOKIE['ref']))
        {
            $_COOKIE['ref'] = $ref;
            setcookie("ref", $ref, time()+60*60*24*30*3, "/");
        }
    }
    if (!isset($_SESSION['initiate']))
    {
        session_regenerate_id();
        $new_session_id = session_id();
        session_write_close();
        session_id($new_session_id);
        session_start();        
        $_SESSION['initiate'] = 1;
    }
    /*
    $_COOKIE['ref'] = "inna_wartosc";
    setcookie("ref", "inna_wartosc", time()+60*60*24*30*3);
     // ZMIANA WARTOSCI
     */
    ob_start(); //output_buffering start
?>
   
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
     
        <title>Zmienna Predefiniowana $_COOKIE - by Arkadiusz Włodarczyk - videokurs.pl</title>

    </head>
    <body>

        <?php
            
            if (isset($_GET['akcja']) && $_GET['akcja'] == "wyloguj")
            {
                $_SESSION['zalogowany'] = 0;
                session_destroy();
                echo "Zostałeś pomyślnie wylogowany<br />";
            }
            if ($_SESSION['zalogowany'] == 1 && (time() - $_SESSION['time'] > 10*60))
            {
                $_SESSION['zalogowany'] = 0;
                session_destroy();
                echo "Sesja zakończona, zbyt długa nieczynność. Prosimy o ponowne zalogowanie się<br />";               
            }            
            if ($_SESSION['zalogowany'] == 1 && ($_SESSION['info_o_komp'] != $_SERVER['HTTP_USER_AGENT']))
            {
                $_SESSION['zalogowany'] = 0;
                session_destroy();
                echo "Prosimy o ponowne zalogowanie się.";                                
            }
            if ((isset($_POST['login']) && isset($_POST['haslo'])) || $_SESSION['zalogowany'] == 1)
            {
                if ((!empty($_POST['login']) && !empty($_POST['haslo'])) || $_SESSION['zalogowany'] == 1)
                {
                    if ($_SESSION['zalogowany'] == 0)
                    {
                        $login = filter_var($_POST['login'], FILTER_SANITIZE_STRING);
                        $haslo = filter_var($_POST['haslo'], FILTER_SANITIZE_STRING);
                    }
                    
                    if (($login == "Armon" && $haslo == "abc") || $_SESSION['zalogowany'] == 1)
                    {
                        if ($_SESSION['zalogowany'] == 0)
                            $_SESSION['login'] = $login;
                        
                        include ("content.php");
                        $_SESSION['zalogowany'] = 1;
                        $_SESSION['time'] = time();
                        $_SESSION['info_o_komp'] = $_SERVER['HTTP_USER_AGENT'];
                        
                   
                    }
                    else
                        echo "Podałeś niepoprawny login lub hasło. Spróbuj ponownie <a href='index.php'>tutaj</a>";
                    
                }   
                else
                    echo "Nie podałeś loginu lub hasła. Spróbuj ponownie <a href='index.php'>tutaj</a>";
                 
            }
            
           if ($_SESSION['zalogowany'] == 0)
           {
        ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <div>
                    Login: <input type="text" name="login" maxlength="8" size="5" />
                </div>
                <div>
                    Password: <input type="password" name="haslo" maxlength="15" size="5" />
                </div> 
                <div>
                    <input type="submit" value="Zaloguj się" />
                </div>
            </div>
        </form>    
        <?php
           }
           
           ob_end_flush();
        ?>
    </body>
</html>

