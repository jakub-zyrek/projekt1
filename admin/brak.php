<?php
// Otwarcie sesji
session_start();

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');

// Sprawdzenie czy użytkownik jest administratorem
if (!isset($_SESSION['admin'])) {
  header("Location: ../index.php");
}

// Sprawdzenie czy nie ma przerwy technicznej 
$sql = "SELECT * FROM aktywne_przerwy";
$wysz = mysqli_query($polaczenie, $sql);
if (mysqli_num_rows($wysz) > 0) {
  header("Location: ../przerwa.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora</title>
    <link href="./../bootstrap.css" rel="stylesheet">  
  </head>
  <body class="col-12">
    <main style="width: 80%; margin: auto;">
      <br>
      <div class="alert alert-danger" style="width: 80%; margin: auto;">Brak uprawnień</div>  
      <br>
      <a class="btn btn-primary" href="index.php" style="margin: auto; text-align: center; width: 45%;">Przejdź do strony głównej</a>
      &nbsp;
      <a class="btn btn-danger" href="script/przeladuj.php" style="margin: auto; text-align: center; width: 45%;">Przeładuj uprawnienia</a>
      <br>
    </main>
    
    <script src="sidebars.js"></script>
    <script src="bootstrap.bundle.min.js"></script> 
  </body>
</html>