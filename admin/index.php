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
    <title>Panel administratora</title>
    <link href="./../bootstrap.css" rel="stylesheet">  
  </head>
  <body class="col-12" style="display: flex; ">
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
          <a href="index.php" class="nav-item btn btn-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
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
          <a href="zgloszenia.php" class="nav-item btn btn-outline-danger text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
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
      <div class="col-11" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: start; ">
        <div class="col-11 col-lg-5 col-xl-4 m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
            </svg>
            <span>&nbsp;Użytkownicy</span>
          </div>
          <hr>
          <div class="ps-3 pb-2">
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.6rem" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
              </svg>
              <a href="uzytkownicy.php" style="text-decoration: none; color: black;">&nbsp;&nbsp;Dodaj administratora</a>
            </div>
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.6rem;" fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z"/>
              </svg>
              <a href="uzytkownicy.php" style="text-decoration: none; color: black;">&nbsp;&nbsp;Edytuj administratora</a>
            </div>
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.6rem" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
              </svg>
              <a href="uzytkownicy.php" style="text-decoration: none; color: black;">&nbsp;&nbsp;Usuń administratora</a>
            </div>
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer;">
              &nbsp;  
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.6rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
              </svg>
              <a href="uzytkownicy.php" style="text-decoration: none; color: black;">&nbsp;&nbsp;Zbanuj użytkownika</a>
            </div>
          </div>
        </div>
        <div class="col-10 col-lg-6 col-xl-7 m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
              <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
            </svg>
            <span>&nbsp;&nbsp;Statystyki</span>
          </div>
          <hr>
          <div class="ps-3 pb-2">
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer; justify-content: center;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
              </svg>
              &nbsp;&nbsp;
              <b style="font-size: 2rem">
                <?php
                  // Liczba użytkowników w bazie danych
                    $sql = "SELECT COUNT(id) AS 'id' FROM uzytkownik";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);
                    echo $w ['id'];
                ?>
              </b>
            </div>
            <p class="col-12 text-center">Zarejestrowanych użytkowników</p>
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer; justify-content: center;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.5rem" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
              </svg>
              &nbsp;&nbsp;
              <b style="font-size: 2rem">
                <?php
                  // Liczba pytań w bazie danych
                    $sql = "SELECT COUNT(id) AS 'id' FROM pytanie";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);
                    echo $w ['id'];
                ?>
              </b>
            </div>
            <p class="col-12 text-center">Dodanych pytań</p>
            <div class="p-1" style="display: flex; align-items: center; cursor: pointer; justify-content: center; color: red;">
              &nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.4rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
              </svg>
              &nbsp;&nbsp;
              <b style="font-size: 2rem">
                <?php
                  // Liczba aktywnych zgłoszeń w bazie danych
                    $sql = "SELECT COUNT(id) AS 'id' FROM zgloszenia_bez_odp";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);

                    echo $w['id'];
                ?>
              </b>
            </div>
            <p class="col-12 text-center" style="color: red;">Aktywnych zgłoszeń</p>
          </div>
        </div>
        <div class="m-3 col-11 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span>&nbsp;&nbsp;Zgłoszenia</span>
          </div>
          <hr>
          <div class="ps-3 pb-2">
            <?php
            
              // Zapytanie do bazy z zgłoszeniami bez odpowiedzi
                $sql = "SELECT * FROM zgloszenia_bez_odp ORDER BY data DESC LIMIT 10;";
                $wysz = mysqli_query($polaczenie, $sql);

              // Wyświetlenie zgłoszeń
                while ($w = mysqli_fetch_array($wysz)) {
                  echo '<div class="p-1" style="display: flex; align-items: center; cursor: pointer; justify-content: left; width: 100%; text-align: left;">';
                    echo '<div><svg xmlns="http://www.w3.org/2000/svg" style="width: 3.5rem;" fill="currentColor" class="bi bi-envelope-exclamation" viewBox="0 0 16 16"><path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1.5a.5.5 0 0 1-1 0V11a.5.5 0 0 1 1 0Zm0 3a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/></svg></div>';

                    if (strlen($w['opis']) > 60) {
                      $opis = substr($w['opis'], 0, 60);
                      $opis = $opis.'...';
                    } else {
                      $opis = $w['opis'];
                    }

                    echo '<div class="ms-4">';
                      echo '<div><b>'.$w['imie'].' '.$w['nazwisko'].'</b><i> ['.$w['nick'] .']</i></div>';
                      echo '<div>'.$opis.'</div>';
                    echo '</div>';
                  echo '</div>';
                }
            
            ?>
          </div>
        </div>
      </div>
    </main>
    
    <script src="sidebars.js"></script>
    <script src="bootstrap.bundle.min.js"></script> 
  </body>
</html>