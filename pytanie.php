<?php
// Otwarcie sesji
session_start();

// Jeżeli istnieje zmienna
if (isset($_GET['idpytania'])) {
  // Połączenie z bazą danych
  $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

  // Sprawdzenie czy nie ma problemów z połączeniem
  if (mysqli_connect_errno()) {
    // Zamknięcie połączenia, gdy jest problem
    mysqli_close($polaczenie);
  }

  // Zdefiniowanie zmiennych
  $id_pytania = $_GET['idpytania'];

  // Wyszukanie pytania w bazie
  $sql1 = "SELECT *, pytanie.id AS 'idd' FROM pytanie JOIN kategorie ON kategorie.id = pytanie.kategoria_id JOIN uzytkownik ON uzytkownik.id = pytanie.uzytkownik_id WHERE pytanie.id = $id_pytania";
  $zapytanie1 = mysqli_query($polaczenie, $sql1);
  $wynik = mysqli_fetch_array($zapytanie1);

  // Zmienne
  $tytul = $wynik['tytul'];
  $opis = $wynik['opis'];
  $kategoria = $wynik['nazwa'];
  $uzytkownik = $wynik['nick'];
  $idd = $wynik['idd'];
} else {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe | Pytanie</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
      input:focus {
        margin: 0% !important;
        box-shadow: none !important;
      }
    </style>
    <script>
      // Definiowanie zmiennych
      var a = [];
      var i = [];
      var essa = 'essa';
      var px = 'px';
      var carde = 'carde';
      var interval = [];

      // Wyświetlenie komentarzy
      function coment(odp) {
        if (i[odp] == 0) {
          plik = 'script_PHP/wyswietlanie_k.php?odp=' + odp;
          element = document.getElementById("com" + odp);
          xml = null;
          try {
            xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
          } catch (e) {
            try {
              xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
            } catch (e) {
              xml = null;
            }
          }
          if (xml != null) {
            xml.onreadystatechange = function () {
              if (xml.readyState == 4) {
                element.innerHTML = xml.responseText;
              }
            }
            xml.open("POST", plik, true);
            xml.send(null);
          }

          document.getElementById('komet' + odp).innerText = " Ukryj komentarze";
          i[odp] = 1;
        } else {
          document.getElementById('com' + odp).innerHTML = "";
          document.getElementById('komet' + odp).innerText = " Pokaż komentarze";
          i[odp] = 0;
        }
      }

      // Dodawanie koemntarza
      function komentarz(formularz, odp) {
        // Zamienianie znaków specjalnych
        formularz.q.value = formularz.q.value.replaceAll("+", '%2B');
        formularz.q.value = formularz.q.value.replaceAll("!", '%21');
        formularz.q.value = formularz.q.value.replaceAll("#", '%23');
        formularz.q.value = formularz.q.value.replaceAll("$", '%24');
        formularz.q.value = formularz.q.value.replaceAll("&", '%26');
        formularz.q.value = formularz.q.value.replaceAll("(", '%28');
        formularz.q.value = formularz.q.value.replaceAll(")", '%29');
        formularz.q.value = formularz.q.value.replaceAll("*", '%2A');
        formularz.q.value = formularz.q.value.replaceAll(",", '%2B');

        plik = 'script_PHP/dodawanie_k.php?odp=' + odp + '&tresc=' + formularz.q.value;

        xml = null;
        try {
          xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml = null;
          }
        }
        if (xml != null) {
          xml.open("POST", plik, true);
          xml.send(null);
        }

        formularz.q.value = "";
        i[odp] = 0;
        coment(odp);
        return false;
      }

      // Style
      function dzie(serce) {
        document.getElementById(serce).style.backgroundColor = "#dc3545";
        document.getElementById(serce).style.color = "white";
      }

      function dziek(serce, odp) {
        if (a[odp] == 0) {
          document.getElementById(serce).style.backgroundColor = "white";
          document.getElementById(serce).style.color = "#dc3545";
        }
      }

      function dzieki(odp, serce) {
        if (a[odp] == 0) {
          document.getElementById(serce).style.backgroundColor = "#dc3545";
          document.getElementById(serce).style.color = "white";
          if (zaznaczone[odp] != 1) {
            plik = "script_PHP/serduszko.php?dod=1&odp=" + odp;  
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
              xml.open("POST", plik, true);
              xml.send(null);
            }
          }
          a[odp] = 1;
          zaznaczone[odp] = 0;
        } else {
          document.getElementById(serce).style.backgroundColor = "white";
          document.getElementById(serce).style.color = "#dc3545"; 
          plik = "script_PHP/serduszko.php?dod=2&odp=" + odp;
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
            xml.open("POST", plik, true);
            xml.send(null);
          }
          a[odp] = 0;
        }
      }

      // Zdefiniowanie zmiennych
      var essa = "essa";
      var nic = "";
      var zaznaczone = [];
    </script>
  </head>
  <body>
    <header class="p-3 text-bg-dark mb-3">
      <div class="pe-5 ps-5">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-xl-start">
          <a href="index.php" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
              class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
              <path
                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
            </svg>
          </a>
          <ul class="nav col-12 col-xl-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
            <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Strona główna</a></li>
            <li><a href="posty.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Posty</a></li>
            <li>
              <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php"
                data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
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
            <li><button onclick="location.href = 'cennik.php'" type="button"
                class="mb-3 mb-xl-auto btn btn-outline-warning me-auto">PREMIUM</button></li>
          </ul>

          <div class="col-12 col-xl-4 col-xxl-3 mb-3 mb-xl-0 me-lg-5">
            <form class="col-12 d-flex" role="search" action="wyszukiwanie.php">
              <div class="col-6">
                <input type="search" name="wysz" class="form-control form-control-dark text-bg-dark col-12"
                  placeholder="Wyszukaj..." aria-label="Search">
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
    <br>
    <br>

    <div class="container">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3 bg-info-subtle">
            <p class="text-start">
              <?php
                echo $uzytkownik . " | " . $kategoria;
              ?>
            </p>
            <h4 class="my-0 fw-normal text-start">
              <?php
                echo $tytul;
              ?>
            </h4>
            <br>
            <p>
              <?php
                echo $opis;
              ?>
            </p>
            <br>
            <br>
            <?php
              if (isset($_SESSION['zalogowany']) && !isset($_SESSION['ban'])) {
                echo '<div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;"><a href="dodawanie.php?id=' . $idd . '" class="col-4 btn btn-lg btn-outline-info" style="display: flex; justify-content: center; align-items: center; font-size: 1rem;">ODPOWIEDZ&nbsp;<svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a>&nbsp;&nbsp;<a class="btn btn-lg btn-outline-danger col-2" style="display: flex;justify-content: center; align-items: normal; font-size: 1rem; margin-bottom: 2%; margin-top: 2%;" onclick="zglos(this, ' . "'p'" . ', ' . $idd . ')"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16"><path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/></svg>&nbsp;</a></div>';
            }

            ?>
          </div>
          <div class="card-body col-12 col-md-10 col-lg-8" style="margin-left: auto;">
            <?php
              $sql2 = "SELECT * FROM odpowiedzi WHERE idd = $id_pytania";
              $wysz2 = mysqli_query($polaczenie, $sql2);

              while ($w2 = mysqli_fetch_array($wysz2)) {
                $id = $w2['id'];
                echo "<script>a[$id] = 0; zaznaczone[$id] = 0; i[$id] = 0;</script>";
                echo '<div class="col">';
                echo '<div class="card mb-4 rounded-3 shadow-sm" id="o' . $w2['id'] . '">';
                echo '<div class="card-header py-3 ';
                if ($w2['ranga'] == 1) {
                  echo 'bg-warning-subtle';
                } else if ($w2['ranga'] == 2) {
                  echo 'bg-success-subtle';
                }
                echo '">';
                echo '<img src="' . $w2['obraz'] . '" width="32" height="32" class="rounded-circle me-2">';
                echo '&nbsp;<b>' . $w2['nick'] . '</b>';
                if ($w2['ranga'] == 1) {
                  echo ' (PREMIUM)';
                } else if ($w2['ranga'] == 2) {
                  echo ' (EKSPERT)';
                }
                echo '</div>';
                echo '<div class="card-body" style="padding-left: 5%;">';
                if ($w2['ranga'] == 2) {
                  if (isset($_SESSION['zalogowany']) && isset($_SESSION['ranga'])) {
                    $ranga = $_SESSION['ranga'];
                    if ($ranga == 0) {
                      echo "<div class='alert alert-warning'>Aby przeczytać tę odpowiedź musisz mieć konto PREMIUM (możesz je kupić <a href='cennik.php'>tutaj</a>) lub być EKSPERTEM (możesz zobaczyć jak to zrobić <a href='pomoc.php'>tutaj</a>)</div>";
                    } else if ($ranga == 1 || $ranga == 2) {
                      echo $w2['odpowiedz'];
                    }
                  } else {
                    echo "<div class='alert alert-warning'>Aby przeczytać tę odpowiedź musisz mieć konto PREMIUM (jeżeli takie posiadasz <a href='logowanie.php'>zaloguj się</a>)</div>";
                  }
                } else {
                  echo $w2['odpowiedz'];
                }
                echo '</div>';
                echo '<div class="card-footer py-2 text-start"><div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 3%;"> <button';

                if (!isset($_SESSION['zalogowany'])) {
                  echo ' disabled ';
                }

                echo ' type="button" onclick="dzieki(' . $id . ', ' . "'serce" . $id . "'" . ');" onmouseover="dzie(' . "'serce" . $id . "'" . ');" onmouseout="dziek(' . "'serce" . $id . "'" . ", $id" . ')" id="serce' . $id . '" class="btn btn-lg btn-outline-danger" style="display: flex; margin: auto; justify-content: center; align-items: center; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 1;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/></svg>&nbsp;<span id="po"></span></button><button onclick="coment(' . $id . ');" type="button" class="btn btn-lg btn-outline-dark"  style="display: flex; margin: auto; justify-content: center; align-items: center; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 1;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16"><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/></svg>&nbsp;<span id="komet' . $id . '">Wyświetl komentarze</span></button><button type="button" class="btn btn-lg btn-outline-danger" style="display: flex; margin: auto; justify-content: center; align-items: normal; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 0.2;" onclick="zglos(this, ' . "'o'" . ', ' . $id . ');"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16"><path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/></svg>&nbsp;</button></div><div class="card-body col-12 col-md-10" id="com' . $id . '" style="margin-left: auto; transition: 2s ease; overflow: scroll; display: block;"></div></div>';

                echo '</div>';
                echo '</div>';

                if (isset($_SESSION['zalogowany'])) {
                  $uzytkownik = $_SESSION['id'];

                  $sqll = "SELECT * FROM serca WHERE odpowiedz_id = $id AND uzytkownik_id = $uzytkownik";
                  $wysz = mysqli_query($polaczenie, $sqll);

                  if (mysqli_num_rows($wysz) > 0) {
                    echo
                      "<script>
                        zaznaczone[$id] = 1;
                        dzieki($id, 'serce$id');
                      </script>";
                  }
                }

              }

              if (mysqli_num_rows($wysz2) == 0) {
                echo '<div class="alert alert-primary">Nie ma jeszcze żadnej odpowiedzi</div>';
              }

            ?>
          </div>
        </div>
      </div>
    </div>

    <div id="essa" style="position: absolute; margin: auto; width: 80%; left: 10%;"></div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
    <script>
      function zglos(a, obiekt, id) {
        var bycz = '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Dodawanie zgłoszenia</h2></div><div class="card-body"><form method="POST" action="">Dlaczego chcesz zgłosić tę treść?<br><br><textarea id="opinia" rows="3" class="form-control"></textarea><br><a class="btn btn-outline-danger" onclick="zgloszenie(' + ("'" + obiekt + "'") + ', ' + id + ')">Wyślij zgłoszenie</a></form></div></div>'
        document.getElementById(essa).innerHTML = bycz;
        document.getElementById(essa).style.top = (a.offsetTop + a.offsetTop) + px;
        opinia = document.getElementById('opinia');
        opinia.focus();
      }

      function zgloszenie(obiekt, id) {
        opinie = document.getElementById('opinia');
        opinie.value = opinie.value.replaceAll("+", '%2B');
        opinie.value = opinie.value.replaceAll("!", '%21');
        opinie.value = opinie.value.replaceAll("#", '%23');
        opinie.value = opinie.value.replaceAll("$", '%24');
        opinie.value = opinie.value.replaceAll("&", '%26');
        opinie.value = opinie.value.replaceAll("(", '%28');
        opinie.value = opinie.value.replaceAll(")", '%29');
        opinie.value = opinie.value.replaceAll("*", '%2A');
        opinie.value = opinie.value.replaceAll(",", '%2B');
        plik = "script_PHP/zgloszenie.php?obiekt=" + obiekt + "&id=" + id + "&opinia=" + opinie.value;
        xml = null;
        try {
          xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml = null;
          }
        }
        if (xml != null) {
          xml.onreadystatechange = function () {
          }
          xml.open("POST", plik, true);
          xml.send(null);
        }

        document.getElementById(essa).innerHTML = nic;
      }
    </script>
  </body>
</html>