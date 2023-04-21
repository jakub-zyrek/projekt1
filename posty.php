<?php
// Otwarcie sesji
session_start();

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

// Sprawdzenie czy nie ma problemów z połączeniem
if (mysqli_connect_errno()) {
  // Zamknięcie połączenia, gdy jest problem
  mysqli_close($polaczenie);
}

// Sprawdzenie czy zmienna istnieje
if (isset($_GET['l'])) {
  $l = $_GET['l'];
  $sql = "SELECT * FROM liczba_odpowiedzi LIMIT 10 OFFSET $l ";
} else {
  $sql = "SELECT * FROM liczba_odpowiedzi LIMIT 10 ";
}
  
// Wysłanie zapytania
$zap1 = mysqli_query($polaczenie, $sql);

$sql1 = "SELECT COUNT(id) AS 'idd' FROM liczba_odpowiedzi";
$zap2 = mysqli_query($polaczenie, $sql1);

?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe | Posty</title>
    <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
  </head>
  <body>
    <header class="p-3 text-bg-dark mb-3">
      <div class="pe-5 ps-5">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-xl-start">
          <a href="index.php" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
          </a>
          <ul class="nav col-12 col-xl-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
            <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Strona główna</a></li>
            <li><a href="posty.php"  class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Posty</a></li>
            <li>
              <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php" data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
              <ul class="dropdown-menu">
                  <?php
                    // Wyświetlenie kategorii
                    $sql1 = "SELECT nazwa FROM liczba_kategorii LIMIT 4";
                    $wysz1 = mysqli_query($polaczenie, $sql1);
                    while ($w1 = mysqli_fetch_array($wysz1)) {
                      $nazwa = $w1['nazwa'];
                      echo "<li><a class='dropdown-item' href='posty_k.php?kat=$nazwa'>$nazwa</a></li>";
                    }
                  ?>
                <li><a class="dropdown-item" href="kategorie.php">Więcej...</a></li>                
              </ul>
            </li>
            <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2">O nas</a></li>
            <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2">Pomoc</a></li>
            <li><button onclick="location.href = 'cennik.php'" type="button" class="mb-3 mb-xl-auto btn btn-outline-warning me-auto" >PREMIUM</button></li>
          </ul>
  
          <div class="col-12 col-xl-4 col-xxl-3 mb-3 mb-xl-0 me-lg-5">
            <form class="col-12 d-flex" role="search" action="wyszukiwanie.php">
              <div class="col-6">
                <input type="search" name="wysz" class="form-control form-control-dark text-bg-dark col-12" placeholder="Wyszukaj..." aria-label="Search">
              </div>
              &nbsp;&nbsp;
              <button type="submit" class="btn btn-outline-light me-2 col-6">Szukaj</button>
            </form>
          </div>
           
          <div class="text-center mb-2 mb-xl-0 col-12 col-xxl-auto text-xxl-end mt-3 mt-xxl-0">
            <?php
              if (isset($_SESSION['zalogowany'])) {
                // Wyświetlenie okienka z menu użytkownika
                echo '<div class="dropdown"><a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img src="'.$_SESSION['obraz'].'" alt="" width="32" height="32" class="rounded-circle me-2"><strong class="d-none d-lg-inline">'.$_SESSION['imie'].'</strong></a><ul class="dropdown-menu dropdown-menu-dark text-small shadow"><li><a class="dropdown-item" href="profil.php">Profil</a></li><li><a class="dropdown-item" href="dodawanie_p.php">Zadaj pytanie</a></li><li><hr class="dropdown-divider"></li>';

                // Pole tylko dla administratora
                if (isset($_SESSION['admin'])) {
                  echo '<li><a class="dropdown-item text-primary" href="admin/index.php">Przejdź do panelu administratora</a></li>';
                }
                
                echo '<li><hr class="dropdown-divider"></li><li><a class="dropdown-item text-danger" href="script_PHP/wyloguj.php">Wyloguj się</a></li></ul></div>';
              } else {
                // Wyświetlenie przycisków logowania
                echo '<button type="button" class="btn btn-outline-light me-2" onclick="';
                echo "location.href = 'logowanie.php'";
                echo '">Zaloguj się</button><button type="button" class="btn btn-info" onclick="';
                echo "location.href = 'rejestracja.php'";
                echo '">Zarejestruj się</button>';
              }              
            ?>
          </div>
        </div>
      </div>
    </header>
   
    <div class="container">
      <div class="card">
        <div class="card-header bg-info">
          <h2 class="p-4 text-center">Posty</h2>
        </div>
        <div class="card-body">
          <?php
            while ($w = mysqli_fetch_array($zap1)) {
              echo '<div class="card">';
                echo '<div class="card-header p-4 bg-success-subtle" style="display: flex; justify-content: space-between; flex-wrap: wrap;">';
                  echo '<h3 class="col-12 col-md-8">';
                    echo $w['tytul'];
                  echo '</h3>';
                  echo '<div class="text-end m-md-0 col-4" style="width: max-content; margin: auto;">';
                    echo '<a href="pytanie.php?idpytania='.$w['id'].'" class="btn btn-outline-info"><div style="display: flex; align-content: center; justify-content: space-between;">PRZEJDŹ&nbsp;<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg></div></a>&nbsp;';

                    echo '<a href="dodawanie.php?id='.$w['id'].'" class="btn btn-info"><div style="display: flex; align-content: center; justify-content: space-between;">ODPOWIEDZ&nbsp;<svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></div></a>';
                  echo '</div>';
                echo '</div>';
                echo '<div class="card-body">';
                  echo "<img src='".$w['obraz']."' alt='' width='32' height='32' class='rounded-circle me-2'>".$w['nick']." · ".$w['nazwa']." · ";
                  if ($w['odp'] == 1) {
                    echo "<b>1 odpowiedź</b>";
                  } else {
                    echo "<b>".$w['odp']." odpowiedzi</b>";
                  }
                echo '</div>';
              echo '</div><br>';
            }
          ?>
          <div class="card">
            <div class="card-header text-end">
              Numer strony: &nbsp;
              <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                  if (isset($_GET['a'])) {
                    echo $_GET['a'];
                  } else {
                    echo 1;
                  }
                ?>
              </a>
              <ul class="dropdown-menu">
                <?php
                  // Zdefiniowanie zmiennych
                  $w3 = mysqli_fetch_array($zap2);
                  $liczba = $w3['idd'];
                  $i = 0;
                  $a = 1;

                  do {
                    echo "<li><a class='dropdown-item' href='posty.php?l=$i&a=$a'>$a</a></li>";
                    $i = $i + 10;
                    $a++;
                  } while ($i < $liczba)
                ?>             
              </ul>
            </div>
          </div>          
        </div>
      </div>
    </div>

    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Strona główna</a></li>
          <li class="nav-item"><a href="posty.php" class="nav-link px-2 text-muted">Posty</a></li>
          <li class="nav-item"><a href="onas.php" class="nav-link px-2 text-muted">O nas</a></li>
          <li class="nav-item"><a href="pomoc.php" class="nav-link px-2 text-muted">Pomoc</a></li>
          <li class="nav-item"><a href="cennik.php" class="nav-link px-2 text-muted">PREMIUM</a></li>
        </ul>
      </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script>
      function f(a) {
        location.href = "posty.php";
        location.href = ("posty.php?l=" + a);
      }
    </script>
  </body>
</html>