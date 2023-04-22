<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_a'])) {
        header("Location: ../brak.php");
    }

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');

        // Sprawdzenie czy nie ma problemu z połączeniem
        if (!mysqli_connect_errno()) {    
            // Wyświetlanie 
            echo '<div class="card col-12"><div class="card-header bg-primary-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(dod).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-primary-subtle"><h2 class="p-3 text-center">Dodawanie administratora</h2></div><div class="card-body"><div style="width: 60%; margin: auto; display: flex; align-items: center; justify-content: center; flex-wrap: nowrap;"><span>Nick:&nbsp;&nbsp;</span><input type="text" id="szukaj_nick" list="lista" class="form-control"></div><br><div style="width: 100%; text-align: center;"><datalist id="lista">';
            
            $sql = "SELECT nick FROM uzytkownik LEFT JOIN administratorzy ON administratorzy.uzytkownik_id = uzytkownik.id WHERE ranga != 4 AND administratorzy.id IS NULL;"; 
            $wysz = mysqli_query($polaczenie, $sql); 
            while ($w = mysqli_fetch_array($wysz)) { 
                $nick = $w['nick']; 
                echo '<option value="'.$nick.'">'; 
            }
            
            echo '</datalist><button onclick="szukaj_uzytkownika(document.getElementById('."'szukaj_nick'".').value);" type="button" class="btn btn-primary" style="margin: auto; width: 20%;">Szukaj</button></div><br><br><form id="szukanie_u"></form></div></div>';
        }
    }

?>