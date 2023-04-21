<?php
// Otwarcie sesji
session_start();

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');

// Sprawdzenie czy użytkownik jest administratorem
if (!isset($_SESSION['admin'])) {
  header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora | Zgłoszenia</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="./../bootstrap.css" rel="stylesheet">

    <script>
        var essa = "info";
        var nic = "";

        var byczz = '<div class="card col-12"><div class="card-header bg-success-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-success-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: 2100</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik</td><td>Jakub Żyrek</td></tr><tr><td>Treść zgłoszenia</td><td>Anna Gałwa promuje przechodzenie przez rondo</td></tr></table><form action="" method="post" class="needs-validation" novalidate><textarea name="odpowiedz" id="odpowiedz" style="width: 100%; border-radius: 1vw; padding: 2%;" rows="10"></textarea></form></div></div>';
    
        var bycz = '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: 2100</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik zgłaszający</td><td>Jakub Żyrek</td></tr><tr><td>Użytkownik zgłoszony</td><td>Anna Gałwa</td></tr><tr><td>Zgłoszony za</td><td>Pytanie</td></tr><tr><td>Treść</td><td>Czy przechodzenie przez środek ronda jest legalne??</td></tr><tr><td>Treść zgłoszenia</td><td>Anna Gałwa promuje przechodzenie przez rondo</td></tr></table></div></div>';
      </script>
    
</head>
  <body class="col-12 bg-dark" style="display: flex;">
    <main class="d-flex flex-nowrap">
      <div class="p-3 text-bg-dark col-12" >
        <a class="col-1 mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4 d-none d-xxl-inline">Forum internetowe</span>
          <svg xmlns="http://www.w3.org/2000/svg" style="width: 3rem; margin: auto;" fill="currentColor" class="bi bi-chat-left-dots-fill d-xxl-none" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
          </svg>
        </a>
        <hr>
        <nav class="nav col-12 col-xxl-12 text-center text-xl-start">
          <a href="index.php" class="nav-item btn btn-outline-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
              <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
              <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
            </svg>
            <span class="d-none d-xl-inline">&nbsp;&nbsp;Główna</span>
          </a>
          <a href="statystyki.php" class="nav-item btn btn-outline-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
              <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
            </svg>
            <span class="d-none d-xl-inline">&nbsp;&nbsp;Statystyki</span>
          </a>
          <a href="uzytkownicy.php" class="nav-item btn btn-outline-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
              <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            </svg>
            <span class="d-none d-xl-inline">&nbsp;&nbsp;Użytkownicy</span>
          </a>
          <a href="zgloszenia.php" class="nav-item btn btn-danger text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span class="d-none d-xl-inline">&nbsp;&nbsp;Zgłoszenia</span>
          </a>
          <a href="przerwa.php" class="nav-item btn btn-outline-warning text-xxl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-cone-striped" viewBox="0 0 16 16">
              <path d="m9.97 4.88.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.158-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z"/>
            </svg>
            <span class="d-none d-xxl-inline" style="font-size: small;">&nbsp;&nbsp;Przerwa techniczna</span>
          </a>
        </nav>
        <hr>
        <div class="dropdown" style="position: absolute;">
          <a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $_SESSION['obraz'];?>" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong class="d-none d-lg-inline"><?php echo $_SESSION['nick']?></strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow ms-3" style="position: absolute;">
            <li><a class="dropdown-item" href="../profil.php">Profil</a></li>
            <li><a class="dropdown-item text-info" href="../index.php">Przejdź do forum</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="../script_PHP/wyloguj.php">Wyloguj się</a></li>
          </ul>
        </div>
      </div>
    </main>

    <main class="col-10" style="background-color: gainsboro;">
      <div class="p-3">
        <h1 class="d-inline d-md-none text-danger">To okno panelu administracyjnego jest dostępne tylko na większych ekranach</h1>
      </div>
      <div class="col-11" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: start; ">  
        <div class="col-11 d-none d-md-table-row m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.2rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span>&nbsp;Zgłoszenia</span>
          </div>
          <hr>
          <div class="ps-3 pb-2">
            <table class="table col-12 table-hover">
              <tr class="table-primary">
                <th>Lp.</th>
                <th>Od</th>
                <th>Dla</th>
                <th>Data</th>
                <th>Typ</th>
                <th></th>
              </tr>
              <tr>
                <td>1.</td>
                <td>Jakub Żyrek</td>
                <td>Anna Gałwa</td>
                <td>24.10.2022 16:04</td>
                <td>Zgłoszenie</td>
                <td style="width: min-content; text-align: center;">
                  <button type="button" class="btn btn-outline-warning" onclick="document.getElementById('info').innerHTML = bycz; var a = document.getElementById('card'); document.getElementById('essa').style.top = (a.offsetTop + 20) + 'px';">Szczegóły</button>

                  &nbsp;&nbsp;

                  <button type="button" class="btn btn-outline-primary dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">
                    <span>Czynności</span>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item">Zbanuj użytkownika: Anna Gałwa</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="kategorie.php?kat=CSS">Zignoruj zgłoszenie</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="#">Wyślij maila ostrzegaącego</a>
                      </li>
                    </ul>
                  </button>
                </td>
              </tr>
              <tr>
                <td>1.</td>
                <td>Jakub Żyrek</td>
                <td>Anna Gałwa</td>
                <td>24.10.2022 16:04</td>
                <td>Pomoc</td>
                <td style="width: min-content; text-align: center;">
                  <button type="button" class="btn btn-outline-success" onclick="document.getElementById('info').innerHTML = byczz; var a = document.getElementById('card'); document.getElementById('essa').style.top = (a.offsetTop + 20) + 'px';">Odpisz</button>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </main>
    
    <div id="info" style="position: absolute; margin: auto; width: 80%; left: 10%;"></div>

    <script src="sidebars.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
  </body>
</html>