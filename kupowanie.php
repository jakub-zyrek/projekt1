<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy zalogowany
if(!isset($_SESSION['zalogowany'])) {
  header("Location: index.php");
}

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

// Sprawdzenie czy nie ma problemów z połączeniem
if (mysqli_connect_errno()) {
  // Zamknięcie połączenia, gdy jest problem
  mysqli_close($polaczenie);
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe | Kupowanie planu PREMIUM</title>
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

    <form action="script_PHP/zakup.php" class="needs-validation" method="post" novalidate>
      <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <div class="card col-12 col-md-7 m-2">
          <div class="card-header p-3">
            <h2>Kupowanie planu PREMIUM</h2>
          </div>
          <div class="card-body">
            <div class="col-11" style="margin-left: auto; margin-right: auto;">
              <h4>Dane osobowe</h4>
              <br>
              <div class="ms-3">
                <div style="display: flex; justify-content: space-between;">
                  <div class="col-5">
                    <label for="firstName" class="form-label">Imię</label>
                    <br>
                    <input value="<?php echo $_SESSION['imie'];?>" disabled type="text" class="form-control" placeholder="Imię">
                  </div>
                  <div class="col-6">
                    <label for="firstName" class="form-label text-start">Nazwisko</label>
                    <br>
                    <input name="nazwisko" type="text" class="form-control align-items-center" id="firstName" placeholder="Nazwisko" required>
                    <br>
                  </div>
                </div>
                <div class="col-12">
                  <label for="firstName" class="form-label text-start">Email</label>
                  <br>
                  <input name="email" type="email" class="form-control align-items-center" id="firstName" placeholder="Email" required style="margin-left: auto; margin-right: auto;">
                  <br>
                </div>
              </div>
              <h4>Plan premium</h4>
              <br>
              <div class="ms-3">
                <div class="col-12">
                  <label for="firstName" class="form-label text-start">Plan</label>
                  <br>
                  <a class="btn btn-outline-dark dropdown-toggle me-2 mb-3 mb-lg-auto col-12" data-bs-toggle="dropdown" aria-expanded="false" id='pl'>WYBIERZ</a>
                  <input type="hidden" name="plan" id="plan_id">
                  <ul class="dropdown-menu">
                    <li style='cursor: pointer;' onclick="plann(1)"><a class='dropdown-item'>PLAN PREMIUM PRO</a></li>
                    <li style='cursor: pointer;' onclick="plann(2)"><a class='dropdown-item'>PLAN PREMIUM EXCLUSIVE</a></li>                  
                  </ul>
                  <br>
                  <br>
                </div>
              </div>
              <h4>Adres</h4>
              <br>
              <div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="ms-3">
                <div class="col-12 col-lg-6">
                  <label for="firstName" class="form-label">Ulica</label>
                  <br>
                  <input name="ulica" type="text" class="form-control" id="ulica" placeholder="Ulica" zstyle="margin-left: auto; margin-right: auto;" required>
                </div>
                <div class="col-12 col-lg-5 mt-3 mt-lg-0">
                  <label for="firstName" class="form-label text-start">Numer</label>
                  <br>
                  <div style="display: flex; flex-wrap: nowrap; justify-content: space-between; align-items: center;">
                    <input type="text" class="form-control align-items-center" name="numer_1" id="numer" required>
                    <span style="font-size: 1.5rem;">&nbsp;/&nbsp;</span>
                    <input type="text" class="form-control align-items-center" name="numer_2" id="dom">
                  </div>
                  <br>
                </div>
              </div>
              <div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="ms-3">
                <div class="col-12 col-lg-3">
                  <label class="form-label">Województwo</label>
                  <div>
                    <a class="btn btn-outline-dark dropdown-toggle me-2 mb-3 mb-lg-auto col-12" data-bs-toggle="dropdown" aria-expanded="false" id='woj'>WYBIERZ</a>
                    <ul class="dropdown-menu">
                      <?php
                        $sql = "SELECT * FROM wojewodztwo ORDER BY nazwa;";
                        $wysz = mysqli_query($polaczenie, $sql);

                        while ($w = mysqli_fetch_array($wysz)) {
                          $nazwa = $w['nazwa'];
                          $id = $w['id'];
                          echo "<li style='cursor: pointer;' onclick='powiat($id, ".'"'.$nazwa.'"'.")'><a class='dropdown-item'>$nazwa</a></li>";
                        }
                      ?>               
                    </ul>    
                    <input type="hidden" name="powiatt" id="i_powiat" required class="form-control">
                  </div>          
                </div>
                <div id="powiat" class="col-12 col-lg-4 mt-3 mt-lg-0"></div>
                <script>
                  function powiat(id, nazwa) {
                    if (nazwa.length > 10) {
                      document.getElementById('woj').innerHTML = nazwa.substring(0,9) + '... ';
                    } else {
                      document.getElementById('woj').innerHTML = nazwa + ' ';
                    }
                  
                    plik = 'script_PHP/powiat.php?id=' + id;
                    element = document.getElementById("powiat");
              
                    xml = null;
                    try {
                      xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
                    } catch(e) {
                      try {
                        xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
                      } catch(e) {
                        xml = null;
                      }
                    }
                  
                    if (xml != null) {
                      xml.onreadystatechange = function() {
                        if (xml.readyState==4) {
                          element.innerHTML=xml.responseText;
                        }
                      }
                      xml.open("POST", plik, true);                        
                      xml.send(null);
                    }
                  }

                  function powiat_n(nazwa, id) {
                    if (nazwa.length > 17) {
                      document.getElementById('pow').innerHTML = nazwa.substring(0,16) + '... ';
                    } else {
                      document.getElementById('pow').innerHTML = nazwa + ' ';
                    }

                    document.getElementById('m').innerHTML = '<label for="miastoo" class="form-label">Miasto</label><input type="text" name="miastoo" id="miastoo" class="form-control col-12" required>';
                    document.getElementById('but').innerHTML = '<br><button type="submit" class="btn btn-warning col-12">Przejdź do PREMIUM</button>';
                    document.getElementById('i_powiat').value = id;
                  }

                  function miasto(nazwa, id) {
                    if (nazwa.length > 14) {
                      document.getElementById('pow').innerHTML = nazwa.substring(0,13) + '... ';
                    } else {
                      document.getElementById('pow').innerHTML = nazwa + ' ';
                    }

                    document.getElementById('m').innerHTML = '<label for="miastoo" class="form-label">Miasto</label><input disabled type="text" name="miastoo" id="miastoo" class="form-control col-12" value="'+nazwa+'">';
                    document.getElementById('but').innerHTML = '<br><button type="submit" class="btn btn-warning col-12">Przejdź do PREMIUM</button>';
                    document.getElementById('i_powiat').value = id;
                  }
                </script>
                <div class="col-12 col-lg-4 mt-3 mt-lg-0" id="m">&nbsp;</div>
              </div>
              <br>
              <h4>Płatność</h4>
              <div class="ms-3">
                <div class="col-12" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
                  <button type="button" class="btn btn-outline-dark col-12 col-lg-5"  onclick="kupno(1)">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                      <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                    </svg>
                    Karta
                  </button>
                  <button type="button" class="btn  btn-outline-dark col-12 col-lg-6 mt-3 mt-lg-0" onclick="kupno(2)" style="display: flex; flex-wrap: none; justify-content: center; align-items: center;">
                    <img src="https://www.blik.com/layout/default/dist/gfx/logo/logo.svg" alt="logo_blika" style="width: 30%">&nbsp;&nbsp;
                    BLIK
                  </button>
                </div>
              </div>
              <div id="platnosc">
                &nbsp;
              </div>
              <div class="align-items-center col-12" id="but">
                <br>
                <button disabled type="submit" class="btn btn-warning col-12">Przejdź do PREMIUM</button>
              </div>
              <input type="hidden" name="plannn" id="plannn">
            </div>
          </div>
        </div>
    
        <div class="card col-12 col-md-4 m-2 text-center" >
          <div class="card-header p-3">
            <h3>Podsumowanie zamówienia</h3>
          </div>
          <div class="card-body">
            <div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;">
              <p id="p_nazwa"></p>
              <p id="p_cena"></p>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 2%;">
              <h5>RAZEM:</h5>
              <h5 id="r_cena">0 zł</h5>
            </div>
            <div id="znizka">
              <input type="hidden" name="kod_rabatowy" id="kod_rabatowy" value="none">
              <input id="cenaaa" type="hidden" name="cenaaa" value="1">
              <div style="display: flex; justify-content: end;">
                <p>ZNIŻKA</p>&nbsp;
                <p class="text-success">- 34,00 zł</p>
              </div>
              <div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;">
                <h5>ZE ZNIŻKĄ:</h5>
                <h5>0 zł</h5>
              </div>
            </div>
            <br>
            <h5 style="text-align: center; margin-bottom: 2%;">KOD RABATAOWY</h5>
            <div class="col-12" style="display: flex; flex-wrap: nowrap; justify-content: space-between;">
              <input type="text" class="form-control" id="kodzik">&nbsp;&nbsp;
              <button type="button" class="btn btn-outline-danger col-3" onclick="kodd = getElementById('kodzik').value; kod(kodd); ">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
                  <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>
  
    <script>
      // Zdefiniowanie zmiennych
      var cena = 0;
      var kodd = 0;

      // Funkcja szukająca kodu rabatowego
      function kod(kodd) {
        plik = 'script_PHP/kod.php?kod=' + kodd + '&cena=' + cena;
        element = document.getElementById("znizka");
                
        xml = null;
        try {
          xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch(e) {
          try {
          xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch(e) {
            xml = null;
          }
        }
        
        if (xml != null) {
          xml.onreadystatechange = function() {
          if (xml.readyState==4) {
            element.innerHTML=xml.responseText;
          }
          }
          xml.open("POST", plik, true);
          xml.send(null);
        }
      }
        
      // Funkcja wybierająca plan premium
      function plann(id) {
        if (id == 1) {
          document.getElementById('p_nazwa').innerText = "PLAN PREMIUM PRO";
          document.getElementById('p_cena').innerText = "15 zł";
          document.getElementById('pl').innerText = "PLAN PREMIUM PRO";
          cena = 15;
          document.getElementById('r_cena').innerText = cena + " zł";
          document.getElementById('plannn').value = 1;
          document.getElementById('cenaaa').value = cena;
          kod(kodd);
        } else if (id == 2) {
          document.getElementById('p_nazwa').innerText = "PLAN PREMIUM EXCLUSIVE";
          document.getElementById('p_cena').innerText = "30 zł";
          document.getElementById('pl').innerText = "PLAN PREMIUM EXCLUSIVE";
          cena = 30;
          document.getElementById('r_cena').innerText = cena + " zł";
          document.getElementById('plannn').value = 2;
          document.getElementById('cenaaa').value = cena;
          kod(kodd);
        }
      }
    </script>

    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
          </svg>
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
  
    <script src="formularz.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <script>
      var karta = '<div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="col-12 m-3 "><div class="col-12"><label for="karta" class="form-label text-start col-12">Numer karty</label><br><input type="text" maxlength="16" class="form-control align-items-center" id="karta" placeholder="Numer karty" required style="margin-left: auto; margin-right: auto;"><br></div><div style="display: flex; justify-content: space-between; flex-wrap: nowrap;" class="col-12"><div class="col-6"><label for="data1" class="form-label">Data ważności (MM-YY)</label><br><div style="display: flex; flex-wrap: nowrap; justify-content: space-between; align-items: center;"><input type="text" min="0" max="12" class="form-control align-items-center" id="data1" required><span style="font-size: 1.5rem;">&nbsp;/&nbsp;</span><input type="text" min="22" max="40" class="form-control align-items-center" required></div></div>&nbsp;<div class="col-5"><label for="csv" class="form-label text-start">CSV</label><br><input type="text" class="form-control align-items-center" id="csv" placeholder="CSV" maxlength="3" required style="margin-left: auto; margin-right: auto;"><br></div></div></div>';

      var blik = '<div class="col-12 col-md-8 m-3"><label for="firstName" class="form-label">Kod BLIK</label><div style="display: flex; flex-wrap: nowrap; align-items: center;"><input type="text" maxlength="1" class="form-control" id="blik1" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik2" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik3" required><span class="m-3">-</span><input type="text" maxlength="1" class="form-control" id="blik4" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik5" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik6" required></div></div>'

      function kupno(a) {
        if (a == 1) {
          document.getElementById('platnosc').innerHTML = karta;
        } else if (a == 2) {
          document.getElementById('platnosc').innerHTML = blik;
        }
      }
      
      kupno(1);
    </script>

    <?php
      if (isset($_GET['plan'])) {
        if($_GET['plan'] == 1) {
          echo "<script>plann(1);</script>";
        } else {
          echo "<script>plann(2);</script>";
        }
      } 
    ?>
  </body>
</html>