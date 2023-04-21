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
        <title>Panel administratora | Statystyki</title>
        <link href="./../bootstrap.css" rel="stylesheet">
    </head>
    <body class="col-12 bg-dark" style="display: flex; ">
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
            <a href="uzytkownicy.php" class="nav-item btn btn-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
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

            <main class="col-10 " style="background-color: gainsboro;">
                <div class="p-3">
                    <h1 class="d-inline d-xl-none text-danger">To okno panelu administracyjnego jest dostępne tylko na większych ekranach</h1>
                </div>
                <div class="col-11 d-none d-xl-inline" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: start; ">
                    <div class="col-11 m-3 bg-white p-2">
                        <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                            &nbsp;Administratorzy
                        </div>
                        <hr>
                        <button class="btn btn-outline-primary col-11" style="width: 100%; display: flex; align-items: center; justify-content: center; margin-bottom: 1%; text-align: center;" type="button">Dodaj administratora&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></button>
                        <div class="ps-3 pb-2">
                            <table class="table col-12 table-hover">
                                <tr class="table-primary">
                                    <th>Lp.</th>
                                    <th>Imię</th>
                                    <th>Nazwisko</th>
                                    <th>Login</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Jakub</td>
                                    <td>Żyrek</td>
                                    <td>zyrekjakub</td>
                                    <td style="text-align: center; display: flex; align-items: center; justify-content: space-evenly; flex-wrap: nowrap;">
                                        <button type="button" class="btn btn-outline-danger" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                            </svg>
                                            &nbsp;
                                            Usuń
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                            </svg>
                                            &nbsp;
                                            Zawieś
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-success" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                            &nbsp;
                                            Reset hasła
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Anna</td>
                                    <td>Gałwa</td>
                                    <td>rondo</td>
                                    <td style=" text-align: center; display: flex; align-items: center; justify-content: space-evenly; flex-wrap: nowrap;">
                                        <button type="button" class="btn btn-outline-danger" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                            </svg>
                                            &nbsp;
                                            Usuń
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                            </svg>
                                            &nbsp;
                                            Zawieś
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-success" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                            &nbsp;
                                            Reset hasła
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Kasia</td>
                                    <td>Kuchejda</td>
                                    <td>kasia</td>
                                    <td style=" text-align: space-evenly; display: flex; align-items: center; justify-content: space-evenly; flex-wrap: nowrap;">
                                        <button type="button" class="btn btn-outline-danger" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/>
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/>
                                            </svg>
                                            &nbsp;
                                            Usuń
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
                                            </svg>
                                            &nbsp;
                                            Zawieś
                                        </button>
                                        &nbsp;
                                        <button type="button" class="btn btn-outline-success" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                            &nbsp;
                                            Reset hasła
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-11 m-3 bg-white p-2">
                        
                        <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                            &nbsp;Użytkownicy
                        </div>
                        <hr>
                        <div class="ps-3 pb-2 col-12">
                            <table class="table col-12 table-hover">
                                <tr class="table-primary">
                                    <th class="col-1">Lp.</th>
                                    <th class="col-2">Imię i nazwisko</th>
                                    <th class="col-1">Ranga</th>
                                    <th class="col-1">PREMIUM</th>
                                    <th class="col-1">Polubień</th>
                                    <th class="col-1">Odpowiedzi</th>
                                    <th class="col-1">Zgłoszeń</th>
                                    <th class="col-4"></th>
                                </tr>
                                <?php
                                
                                    $sql = "SELECT imie, uzytkownik.id, ranga, ekspert, nazwisko FROM uzytkownik JOIN uzytkownicy_dane ON uzytkownicy_dane.id = uzytkownik.id;";
                                    $wysz = mysqli_query($polaczenie, $sql);

                                    $i = 1;

                                    while ($w = mysqli_fetch_array($wysz)) {
                                        $uzytkownik = $w['id'];

                                        // Liczba odpowiedzi
                                        $sql1 = "SELECT COUNT(id) AS id FROM odpowiedz WHERE uzytkownik_id = $uzytkownik";
                                        $wysz1 = mysqli_query($polaczenie, $sql1);
                                        $w1 = mysqli_fetch_assoc($wysz1);
                                        $odpowiedzi = $w1['id'];

                                        // Liczba zgloszen
                                        $sql1 = "SELECT COUNT(id) AS id FROM zgloszenie WHERE zglaszajacy = $uzytkownik";
                                        $wysz1 = mysqli_query($polaczenie, $sql1);
                                        $w1 = mysqli_fetch_assoc($wysz1);
                                        $zgloszenia = $w1['id'];

                                        // Liczba polubień
                                        $sql1 = "SELECT COUNT(serca.id) AS 'id' FROM serca JOIN odpowiedz ON serca.odpowiedz_id = odpowiedz.id WHERE odpowiedz.uzytkownik_id = $uzytkownik;";
                                        $wysz1 = mysqli_query($polaczenie, $sql1);
                                        $w1 = mysqli_fetch_assoc($wysz1);
                                        $polubienia = $w1['id'];

                                        echo '<tr>';
                                            echo "<td>$i</td>";

                                            echo "<td><b>".$w['imie']." ".$w['nazwisko']."</b>";

                                            if ($w['ekspert'] == 1) {
                                                echo "<td class='text-success'>Ekspert</td>";
                                            } else {
                                                echo "<td>Użytkownik</td>";
                                            }
                                            
                                            if ($w['ranga'] == 2 || $w['ranga'] == 1) {
                                                echo "<td class='text-warning'>TAK</td>";
                                            } else {
                                                echo "<td>NIE</td>";
                                            }

                                            echo "<td>$polubienia</td>";

                                            echo "<td>$odpowiedzi</td>";

                                            echo "<td>$zgloszenia</td>";

                                            echo '<td style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;">
                                            <button type="button" class="btn btn-outline-danger mt-1 mt-xxl-0 mb-1 mb-xxl-0" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem"  fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                                                    <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                                                </svg>
                                                &nbsp;
                                                Zbanuj
                                            </button>
                                            &nbsp; &nbsp;
                                            <button type="button" class="btn btn-outline-success mt-1 mt-xxl-0 mb-1 mb-xxl-0" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;">
                                                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                &nbsp;
                                                Zmień rangę
                                            </button>
                                        </td>';

                                        echo '</tr>';

                                        $i++;
                                    }
                               
                                
                                ?>
                            </table>
                        </div>
                    </div>

                    

                </div>
            </main>
        <script src="sidebars.js"></script>
        <script src="bootstrap.bundle.min.js"></script>
    </body>
</html>