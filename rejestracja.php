<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
  header("Location: index.php");
}

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe| Rejestracja</title>
    <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 
  </head>
  <body>
  <header class="p-3 text-bg-dark mb-3">
        <div class="pe-5 ps-5">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-xl-start" >
            <a href="index.php" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4" >
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
            </a>
  
            <ul class="nav col-12 col-xl-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
              <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto "  >Strona główna</a></li>
              <li><a href="posty.php"  class="btn btn-outline-info me-2 mb-3 mb-lg-auto " >Posty</a></li>
              <li>
                <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php" data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
                <ul class="dropdown-menu">
                    <?php
                        $sql1 = "SELECT nazwa FROM liczba_kategorii LIMIT 4";
                        $wysz1 = mysqli_query($polaczenie, $sql1);
                        while ($w1 = mysqli_fetch_array($wysz1)) {
                            $nazwa = $w1['nazwa'];
                            echo "<li><a class='dropdown-item' href='posty_k.php?kat=$nazwa'>$nazwa</a></li>";
                        }
                    ?>
                  <li><a class="dropdown-item" href="kategorie.php">Więcej...</a></li>                
                </ul></li>
                <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2"  >O nas</a></li>
              <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2"  >Pomoc</a></li>
                
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
                echo '
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="'.$_SESSION['obraz'].'" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong class="d-none d-lg-inline">'.$_SESSION['imie'].'</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
                    <li><a class="dropdown-item" href="profil.php">Profil</a></li><li><a class="dropdown-item" href="dodawanie_p.php">Zadaj pytanie</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="script_PHP/wyloguj.php">Wyloguj się</a></li>
                  </ul>
                </div>';
              } else {
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
    <br><br>

  <div class="container  align-items-center form-switch justify-content-center " style="text-align: center; margin-left: auto; margin-right: auto;" >
    <h1 style="text-align: center;">Zarejestruj się</h1>
    <br>
        <?php
        if (isset($_SESSION['powtorka'])) {
          echo '<div class="alert alert-danger">';
          $pow = $_SESSION['powtorka'];
          if ($pow == 'w') {
            echo "Login i nick się powtarzają. Zmień je.";
          } else if ($pow == 'n') {
            echo "Nick się powtarza. Zmień go.";
          } else if ($pow == 'l') {
            echo "Login się powtarza. Zmień go.";
          }
          unset($_SESSION['powtorka']);
          echo "</div>";
        }

        if (isset($_SESSION['dodane'])) {
          echo '<div class="alert alert-success">Dodano konto</div>';
          unset($_SESSION['dodane']);
        }
        ?>
    <form class="needs-validation align-items-center  col-12 "  style="text-align: center; margin-left: auto; margin-right: auto;" novalidate method="post" action="script_PHP/rejestracja.php">
        <div class="row-cols-2 align-items-center">
            <br>
            <label for="firstName" class="form-label">Imię</label>
            
            <input type="text" class="form-control w-50 align-items-center" id="firstName" placeholder="Imię" required style="text-align: center; margin-left: auto; margin-right: auto;" name="imie">
            
        </div>
        <div class="row-cols-2 align-items-center">
            <br>
            <label for="firstName" class="form-label">Nick</label>
            
            <input type="text" class="form-control w-50 align-items-center" id="firstName" placeholder="Nick" required style="text-align: center; margin-left: auto; margin-right: auto;" name="nick">
            
        </div>
        <div class="row-cols-2 align-items-center">
            <br>
            <label for="firstName" class="form-label">Data urodzenia</label>
            
            <input type="date" class="form-control w-50 align-items-center" id="firstName" required style="text-align: center; margin-left: auto; margin-right: auto;" name="data" max="<?php $rok = date('Y') - 7; echo date("$rok-m-d");?>">
            
        </div>
        <div class="row-cols-2">
          <br>
          <label for="firstName" class="form-label">Login</label>
          <br>
          <input type="text" class="form-control w-50 " id="firstName" placeholder="Login" required style="text-align: center; margin-left: auto; margin-right: auto;" name="login">
        </div>
        <div class="row-cols-2 align-items-center">
            <br>
            <label for="firstName" class="form-label">Hasło</label>
            
            <input type="password" class="form-control w-50 align-items-center" id="firstName" placeholder="Hasło" required style="text-align: center; margin-left: auto; margin-right: auto;" name="haslo">
            
            <br>
        </div>
        <div class="align-items-center col-12">
            <button type="submit" class="btn btn-info">Zarejestruj się</button>
          </div>
    </form>
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
    <script src="formularz.js"></script>

  </body>
</html>