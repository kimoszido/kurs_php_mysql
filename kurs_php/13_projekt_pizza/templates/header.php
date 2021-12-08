<?php 

    session_start();
    
    if($_SERVER['QUERY_STRING']  == 'noname'){ 
        unset($_SESSION['name']); 
        //session_unset(); //wyczyszczenie sesji
    }
    $name = $_SESSION['name'] ?? 'Guest'; //przypisz $_SESSION['name'] jeżeli nie istnieje to przypisz 'Guest'

    //get cookie
    $gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
        <title>Ninja Pizza</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <style>
                .brand{
                        background: #cbb09c !important;
                }
                .brand-text{
                        color: #cbb09c !important;
                }
                form{
                        max-width: 460px;
                        margin: 20px auto;
                        padding: 20px;
                }
        </style>
</head>
<body class="grey lighten-4">
        <nav class = "white z-depth-0">
                <div class="container">
                    <a href="#" class="brand-logo brand-text">Ninja Pizza</a>    
                    <ul id="nav-mobile" class="right hide-on-small-and-down">
                            <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                            <li class="grey-text"> (<?php echo htmlspecialchars($gender); ?>)</li>
                            <li><a href="#" class="btn brand z-depth-0">Add a Pizza</a></li>

                    </ul>
                </div>
        </nav>