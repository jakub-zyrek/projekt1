
<!DOCTYPE html>
<html lang="pl">

<head>
    <script>
        var tab1 = [];
        var tab4 = [];
    </script>
    <?php
    session_start();

    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    if(!mysqli_connect_errno()) {
        $sql1 = "SELECT * FROM pomoc";
        $zapytanie1 = mysqli_query($polaczenie, $sql1);
        echo "<script>";
        $tab2 = [];
        while ($wynik = mysqli_fetch_array($zapytanie1)) {
            $id = $wynik['id'];
            $odp = $wynik['odpowiedz'];
            $tab2[$id] = $wynik['pytanie'];
            echo 'tab1['.$id.'] = "'.$odp.'";';
        }
        $sql2 = "SELECT * FROM instrukcje";
        $zapytanie2 = mysqli_query($polaczenie, $sql2);
        $tab4 = [];
        $tab5 = [];
        $tab6 = [];
        while ($wynik1 = mysqli_fetch_array($zapytanie2)) {
            $idd = $wynik1['id'];
            $tab4[$idd] = $wynik1['tytul'];
            $tab5[$idd] = $wynik1['plik'];
            $tab6[$idd] = $wynik1['tekst'];
            echo 'tab4['.$idd.'] = "<a href=";';
        }
        echo "</script>";
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe| Logowanie</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script>
        var tab = [];
        function pytanie(a) {
            if (tab[a] == 0 || isNaN(tab[a])) {
                document.getElementById("b" + a).style.marginTop = "10px";
                document.getElementById("b" + a).style.marginLeft = "10px";
                document.getElementById("b" + a).style.marginBottom = "10px";
                document.getElementById("b" + a).innerText = tab1[a];
                if (a == 22) {
                    document.getElementById("b" + a).innerHTML = 'Instrukcja użytkownika PDF <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>';
                } else if (a == 23) {
                    document.getElementById("b" + a).innerHTML = 'Deklaracja dostępności PDF <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16"><path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/><path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/></svg>';
                }
                document.getElementById("p" + a).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/></svg>';
                tab[a] = 1;
            } else {
                document.getElementById("b" + a).innerText = "";
                document.getElementById("b" + a).style.margin = "0px";
                document.getElementById("p" + a).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>';
                tab[a] = 0;
            }
        }

        var tab3 = [];
        function instrukcje(a) {
            if (tab3[a] == 0 || isNaN(tab3[a])) {
                document.getElementById("c" + a).style.marginTop = "10px";
                document.getElementById("c" + a).style.marginLeft = "10px";
                document.getElementById("c" + a).style.marginBottom = "10px";
                document.getElementById("c" + a).innerText = tab4[a];
                document.getElementById("d" + a).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/></svg>';
                tab3[a] = 1;
            } else {
                document.getElementById("c" + a).innerText = "";
                document.getElementById("c" + a).style.margin = "0px";
                document.getElementById("d" + a).innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>';
                tab3[a] = 0;
            }
        }
    </script>
    <style>
        .card-body {
            transition: 1s ease;
        }
    </style>
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
                  <li><a class="dropdown-item" href="kategorie.php?kat=HTML">HTML</a></li>
                  <li><a class="dropdown-item" href="kategorie.php?kat=CSS">CSS</a></li>
                  <li><a class="dropdown-item" href="kategorie.php">Więcej...</a></li>                </ul></li>
                <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2"  >O nas</a></li>
              <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2"  >Pomoc</a></li>
                
              <li><button onclick="location.href = 'cennik.php'" type="button" class="mb-3 mb-xl-auto btn btn-outline-warning me-auto" >PREMIUM</button></li>
            </ul>
  
            <div class="col-12 col-xl-4 col-xxl-3 mb-3 mb-xl-0 me-lg-5">
                <form class="col-12 d-flex" role="search" action="wyszukiwanie.php">
                  <div class="col-6">
                    <input type="search" class="form-control form-control-dark text-bg-dark col-12" placeholder="Wyszukaj..." aria-label="Search">
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


    <div class="container">
        <h1 class="text-center text-danger">POMOC</h1>
        <br>
        <div class="card col-10" style="margin: auto;">
            <div class="card-header p-4">
                <h3>Często zadawanie pytania</h3>
            </div>
            <div class="card-body">
                <?php

                for ($i = 0; $i < count($tab2)+1; $i++) {
                    if (isset($tab2[$i])) {
                        echo '<div class="card col-12 col-md-11">';
                            echo '<div class="card-header p-3" style="display: flex; flex-wrap: nowrap; align-items: center;">';
                                echo "<h5>";
                                    echo $tab2[$i];
                                echo "</h5>";
                                echo '<button id="p'.$i.'" class="btn btn-outline-danger" style="margin-left: auto;" onclick="pytanie('.$i.');">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>';
                                echo "</button>";
                            echo '</div>';
                            echo '<div class="card-body p-0" id="b'.$i.'"></div>';
                        echo '</div>';
                        echo '<br>';
                    }
                }
                
                ?>
            </div>
        </div>
        <br><br>
        <div class="card col-10" style="margin: auto;">
            <div class="card-header p-4">
                <h3>Dokumenty</h3>
            </div>
            <div class="card-body">
                <?php
                
                for ($i = 0; $i < count($tab4)+1; $i++) {
                    if (isset($tab4[$i])) {
                        echo '<div class="card col-12 col-md-11">';
                            echo '<div class="card-header p-3" style="display: flex; flex-wrap: nowrap; align-items: center;">';
                                echo '<h5>';
                                    echo $tab4[$i];
                                echo '</h5>';
                                echo '<button id="d'.$i.'" class="btn btn-outline-danger" style="margin-left: auto;" onclick="instrukcje('.$i.');">';
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/></svg>';
                                echo "</button>";
                            echo '</div>';
                            echo '<div class="card-body p-0 pobierz" id="c'.$i.'">';
                                
                            echo '</div>';
                        echo '</div>';
                    }
                }
                
                ?>
                <br>
                <div class="card col-12 col-md-11">
                    <?php
                        
                    ?>
                    <div class="card-header p-3" style="display: flex; flex-wrap: nowrap; align-items: center;">
                        <h5>Deklaracja dostępności</h5>
                        <button id="p23" class="btn btn-outline-danger" style="margin-left: auto;" onclick="pytanie(23);">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem;" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="card-body p-0 pobierz">

                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <h1 class="text-center text-danger">Jeżeli to Ci nie pomogło, napisz do nas!</h1>
        <br><br>
        <div id="formularz" class="card mb-4 col-12 col-md-10 col-xl-8 rounded-3 shadow-sm" style="margin: auto;">
            <div class="card-header text-center p-4 bg-danger-subtle">
                <h3>Formularz kontaktowy</h3>
            </div>
            <div class="card-body col-10" style="margin: auto;">
                <form class="needs-validation align-items-center" style="text-align: center; margin-left: auto; margin-right: auto;" method="post" novalidate>
                    <div>
                        <br>
                        <label for="firstName" class="form-label">Imię</label>
                        <br>
                        <input type="text" class="form-control" id="firstName" placeholder="Login"
                            style="text-align: center; margin-left: auto; margin-right: auto;" required>

                    </div>
                    <div>
                        <br>
                        <label for="firstName" class="form-label">Email</label>
                        <br>
                        <input type="email" class="form-control align-items-center" id="email" placeholder="Email" required style="text-align: center; margin-left: auto; margin-right: auto;">
                        <br>
                    </div>
                    <div>
                        <label for="firstName" class="form-label">Opisz swój problem</label>
                        <br>
                        <textarea  class="form-control align-items-center w-100" id="email" placeholder="Email" required style="text-align: center; margin-left: auto; margin-right: auto;" rows="10"></textarea>
                        <br>
                    </div>
                    <div class="align-items-center col-12">
                        <button type="submit" class="btn btn-outline-danger" style="display: flex; justify-content: center; align-items: center; flex-wrap: nowrap; margin: auto;">
                            Wyślij zgłoszenie&nbsp;&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                              </svg>
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <br>
    </div>



    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Strona główna</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Posty</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">O nas</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pomoc</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">PREMIUM</a></li>
            </ul>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="formularz.js"></script>
</body>

</html>