<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie-edge" />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
    />
    <!--<link rel="stylesheet" href="css/icon-font.css">-->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" type="image/png" href="img/favicon.png" />

    <title>Rezerwacja sal konferencyjnych</title>

    <?php
      require_once("db.php");
      require_once("class/class.Klient.php");
      require_once("class/class.Rezerwacja.php");
      
      $host = "localhost";
      $login = "root";
      $password = "";
      $nameDB = "reservationofrooms";

      $db = new db($host, $login, $password, $nameDB);
    ?>
  </head>
  <body>
      <h2 class="h2">Formularz Rezerwacyjny</h2>
    <form action="index.php" method="POST" class="form">
        <input type="text" class="text" name="firstname" placeholder="Imię" >
        <label for="firstname" class="text_label" >Imię</label>
        <input type="text" class="text" name="surname" placeholder="Nazwisko">
        <label for="surname" class="text_label">Nazwisko</label>
        <br>
        <br>
        <input type="date" class="date" name="date">
        <label for="date" class="date_label">Data</label>
        <br>
        <br>
        <input type="time" class="time" name="time_start">
        <label for="time_start" class="time_label">OD</label>
        <input type="time" class="time" name="time_stop">
        <label for="time_stop" class="time_label">DO</label>
        <input type="submit" class="btn" value="Zarezerwuj">
    </form>

    <?php
      if(isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['date']) && isset($_POST['time_start']) && isset($_POST['time_stop']))
      {
          if(!empty($_POST['firstname']) && !empty($_POST['surname']) && !empty($_POST['date']) && !empty($_POST['time_start']) && !empty($_POST['time_stop']))
          {   
              $newClient = new Client($_POST['firstname'], $_POST['surname']);
              $newReservation = new Reservation($_POST['date'], $_POST['time_start'], $_POST['time_stop']);
              $newReservation->saveToBaseReservation($db, $newReservation);
              $newClient->saveToBaseClient($db);                 
          }
      }
    ?>
  </body>
</html>