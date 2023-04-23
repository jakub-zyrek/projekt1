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
if (isset($_SESSION['admin_u']) && isset($_SESSION['admin_a'])) {
    header("Location: brak.php");
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
                        <button class="btn btn-outline-primary col-11" style="width: 100%; display: flex; align-items: center; justify-content: center; margin-bottom: 1%; text-align: center;" type="button" onclick="pokaz();">Dodaj administratora&nbsp; 
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                            </svg></button>
                        <div class="ps-3 pb-2" id="admin"></div>
                    </div>

                    <div class="col-11 m-3 bg-white p-2">
                        
                        <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                            </svg>
                            &nbsp;Użytkownicy
                        </div>
                        <hr>
                        <div class="ps-3 pb-2 col-12" id="uzytkownik"></div>
                    </div>
                </div>
            </main>

        <div id="dod" style="position: absolute; margin: auto; width: 80%; left: 10%; margin-top: 10%;"></div>
        <script src="sidebars.js"></script>
            <script>
            var admi = 0;

            function admin() {
                plik = 'script/wyswietlanie_a.php?admi=' + admi;
                element = document.getElementById("admin");
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

            admin();
            var uzy = 0;

            function uzytkownik() {
                plik1 = 'script/wyswietlenie_u.php?uzy=' + uzy;
                element1 = document.getElementById("uzytkownik");
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

            uzytkownik();

            function admin_usun(id) {
                plik = 'script/usun_a.php?id=' + id;
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

                admin();
            }

            function admin_zawies(id) {
                plik = 'script/zawies_a.php?id=' + id;
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

                admin();
            }

            function admin_odwies(id) {
                plik = 'script/odwies_a.php?id=' + id;
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

                admin();
            }

            function zbanuj(id) {
                plik = 'script/zbanuj_u.php?id=' + id;
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

                uzytkownik();
            }

            function odbanuj(id) {
                plik = 'script/odbanuj_u.php?id=' + id;
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

                uzytkownik();
            }

            function ranga(id, ranga) {
                plik = 'script/ranga.php?id=' + id + '&ranga=' + ranga;
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

                uzytkownik();
            }

            // Wyświetlenie okna dodawania użytkownika
            function zglos(a, obiekt, id) {
                var bycz = '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Dodawanie zgłoszenia</h2></div><div class="card-body"><form method="POST" action="">Dlaczego chcesz zgłosić tę treść?<br><br><textarea id="opinia" rows="3" class="form-control"></textarea><br><a class="btn btn-outline-danger" onclick="zgloszenie(' + ("'" + obiekt + "'") + ', ' + id + ')">Wyślij zgłoszenie</a></form></div></div>'
                document.getElementById(essa).innerHTML = bycz;
                document.getElementById(essa).style.top = (a.offsetTop + a.offsetTop) + px;
                opinia = document.getElementById('opinia');
                opinia.focus();
            }

            function szukaj_uzytkownika(nick) {
                plik2 = 'script/szukanie_u.php?nick=' + nick;
                element2 = document.getElementById("szukanie_u");
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
            }   

            var tab_zmiana = [0, 0, 0, 0, 0];
            function zmiana(id) {
                if (tab_zmiana[id] == 0) {
                    document.getElementById("t" + id).style.backgroundColor = "green";
                    document.getElementById("u" + id).value = 1;
                    tab_zmiana[id] = 1;
                } else {
                    document.getElementById("t" + id).style.backgroundColor = "white";
                    document.getElementById("u" + id).value = 0;
                    tab_zmiana[id] = 0;
                }
            }

            function dodawanie_u() {
                nazwisko = document.getElementById('nazwisko').value;
                uzytkownicy = document.getElementById('u1').value;
                adminn = document.getElementById('u2').value;
                zgloszenia = document.getElementById('u3').value;
                przerwy = document.getElementById('u4').value;
                id = document.getElementById('uzy').value;
                plik3 = 'script/dodawanie_u.php?id=' + id + '&nazwisko=' + nazwisko + '&admin=' + adminn + '&zgloszenia=' + zgloszenia + '&przerwy=' + przerwy + '&uzytkownicy=' + uzytkownicy;
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
                    xml3.open("POST", plik3, true);
                    xml3.send(null);
                }

                document.getElementById(dod).innerHTML = "";
                admin();
            }

            dod = "dod";
            nic = "";

            function pokaz() {
                plik2 = 'script/formularz.php';
                element2 = document.getElementById("dod");
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
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>