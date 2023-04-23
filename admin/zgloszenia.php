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

// Sprawdzenie czy ma uprawnienia 
if (isset($_SESSION['admin_z'])) {
  header("Location: brak.php");
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
          <a href="zarobki.php" class="nav-item btn btn-outline-success text-xxl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
              <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"></path>
              <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"></path>
              <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
            </svg>
            <span class="d-none d-xxl-inline">&nbsp;&nbsp;Panel zarobków</span>
          </a>
          <a href="pomoc.php" class="nav-item btn btn-outline-danger text-xxl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
              <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
              <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span class="d-none d-xxl-inline" style="font-size: small;">&nbsp;&nbsp;Zakładka pomocy</span>
          </a>
        </nav>
        <hr>
        <div class="dropdown" style="position: absolute;">
          <a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $_SESSION['obraz_admin'];?>" alt="" width="32" height="32" class="rounded-circle me-2">
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
            <span>&nbsp;Zgłoszone pytania</span>
          </div>
          <hr>
          <div class="ps-3 pb-2" id="pytania">
          </div>
        </div>
        
        <div class="col-11 d-none d-md-table-row m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.2rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span>&nbsp;Zgłoszone odpowiedzi</span>
          </div>
          <hr>
          <div class="ps-3 pb-2" id="odpowiedzi">
          </div>
        </div>

        <div class="col-11 d-none d-md-table-row m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.2rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span>&nbsp;Zgłoszone komentarze</span>
          </div>
          <hr>
          <div class="ps-3 pb-2" id="komentarze">
          
          </div>
        </div>

        <div class="col-11 d-none d-md-table-row m-3 bg-white p-2">
          <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.2rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
            </svg>
            <span>&nbsp;Pomoc</span>
          </div>
          <hr>
          <div class="ps-3 pb-2" id="pomoc">
            
          </div>
        </div>
      </div>
    </main>
    
    <div id="info" style="position: absolute; margin: auto; width: 80%; left: 10%; margin-top: 6%;"></div>

    <script>
      function pomoc(id) {
        plik2 = 'script/pomoc_okienko.php?id=' + id;
        element2 = document.getElementById("info");
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.onreadystatechange = function () {
            if (xml2.readyState == 4) {
              element2.innerHTML = xml2.responseText;
            }
          }
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }
        scroll(0,0);
      }

      var pomo = 0;

      function pomoc_w() {
        plik = 'script/pomoc_w.php?pomo=' + pomo;
        element = document.getElementById("pomoc");
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
      }

      pomoc_w();

      function pomoc_wyslij(opinie, id) {
        opinie.value = opinie.value.replaceAll("+", '%2B');
        opinie.value = opinie.value.replaceAll("!", '%21');
        opinie.value = opinie.value.replaceAll("#", '%23');
        opinie.value = opinie.value.replaceAll("$", '%24');
        opinie.value = opinie.value.replaceAll("&", '%26');
        opinie.value = opinie.value.replaceAll("(", '%28');
        opinie.value = opinie.value.replaceAll(")", '%29');
        opinie.value = opinie.value.replaceAll("*", '%2A');
        opinie.value = opinie.value.replaceAll(",", '%2B');
        plik = "script/pomoc_d.php?&tresc=" + opinie.value + "&id=" + id;
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

        pomoc_w();
        document.getElementById("info").innerHTML = "";
      }

      function pomoc_u(id) {
        plik2 = 'script/pomoc_u.php?id=' + id;
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }

        pomoc_w();
      }

      var komen = 0;

      function kome_w() {
        plik1 = 'script/kome_w.php?komen=' + komen;
        element1 = document.getElementById("komentarze");
        xml1 = null;
        try {
          xml1 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml1 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml1 = null;
          }
        }
        if (xml1 != null) {
          xml1.onreadystatechange = function () {
            if (xml1.readyState == 4) {
              element1.innerHTML = xml1.responseText;
            }
          }
          xml1.open("POST", plik1, true);
          xml1.send(null);
        }
      }

      kome_w();

      function okno(id, obiekt) {
        plik2 = 'script/okno.php?id=' + id + "&obiekt=" + obiekt;
        element2 = document.getElementById("info");
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.onreadystatechange = function () {
            if (xml2.readyState == 4) {
              element2.innerHTML = xml2.responseText;
            }
          }
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }
        scroll(0,0);
      }

      var pyta = 0;

      function pyt_w() {
        plik3 = 'script/pyt_w.php?pyta=' + pyta;
        element3 = document.getElementById("pytania");
        xml3 = null;
        try {
          xml3 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml3 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml3 = null;
          }
        }
        if (xml3 != null) {
          xml3.onreadystatechange = function () {
            if (xml3.readyState == 4) {
              element3.innerHTML = xml3.responseText;
            }
          }
          xml3.open("POST", plik3, true);
          xml3.send(null);
        }
      }

      pyt_w();
      var odpo = 0;

      function odp_w() {
        plik4 = 'script/odp_w.php?odpo=' + odpo;
        element4 = document.getElementById("odpowiedzi");
        xml4 = null;
        try {
          xml4 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml4 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml4 = null;
          }
        }
        if (xml4 != null) {
          xml4.onreadystatechange = function () {
            if (xml4.readyState == 4) {
              element4.innerHTML = xml4.responseText;
            }
          }
          xml4.open("POST", plik4, true);
          xml4.send(null);
        }
      }

      odp_w();
      
      function kome_u(id) {
        plik2 = 'script/usuwanie.php?id=' + id;
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }

        kome_w();
        pyt_w();
        odp_w();
      }

      function ban(id, idd) {
        plik2 = 'script/ban.php?id=' + id + '&zgloszenie=' + idd;
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }

        kome_w();
        pyt_w();
        odp_w();
      }

      function ostrzezenie(id, idd) {
        plik2 = 'script/ostrzezenie.php?id=' + id + '&zgloszenie=' + idd;
        xml2 = null;
        try {
          xml2 = new ActiveXObject("Microsoft.XMLHTTP"); // IE
        } catch (e) {
          try {
            xml2 = new XMLHttpRequest(); // Mozilla/FireFox/Opera
          } catch (e) {
            xml2 = null;
          }
        }
        if (xml2 != null) {
          xml2.open("POST", plik2, true);
          xml2.send(null);
        }

        kome_w();
        pyt_w();
        odp_w();
      }
    </script>

    <script src="sidebars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>