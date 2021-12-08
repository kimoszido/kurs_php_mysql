<?php
    function przelaczanieStron ($string)
    {
        if (isset($_GET['page']))
                {
                    $allowed_pages = array("java", "php", "mysql");

                    $page = filter_var($_GET['page'], FILTER_SANITIZE_STRING);           

                    if (!empty($page))
                    {
                        if (in_array($page, $allowed_pages))                       
                        {
                            if (is_file($page.".".$string))
                                include($page.".".$string);              
                        }
                    }                   
                }
                else                
                    include ("start.".$string);
    }
?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
        <?php
                przelaczanieStron("php");   
                                    
                echo "<title>$title</title>";
        ?>
        
        
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script type="text/javascript" src="jsc.js"></script>

    </head>
    <body>
        <div id="container">
            <div id="top">
                BANER
            </div>
            
            <div id="menu">
                <div><a href="?page=java">Java</a></div>
                <div><a href="?page=php">PHP</a></div>
                <div><a href="?page=mysql">MySql</a></div>
            </div>
            <div id="content">     
                <div id="text">
        <?php
        przelaczanieStron("html");

        ?>
               </div>
           </div>

        </div>
    </body>
</html>



