<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_z'])) {
        header("Location: ../brak.php");
    }

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        if (isset($_GET['id']) && isset($_GET['obiekt'])) {
            // Deklarowanie zmiennych 
            $id = $_GET['id'];
            $obiekt = $_GET['obiekt'];

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
    
            // Sprawdzenie czy nie ma przerwy technicznej 
            $sql = "SELECT * FROM aktywne_przerwy";
            $wysz = mysqli_query($polaczenie, $sql);
            if (mysqli_num_rows($wysz) > 0) {
                header("Location: ../przerwa.php");
            }
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                
                if ($obiekt == 1) {
                    $sql = "SELECT * FROM zgloszone_pytanie WHERE pytanie_id = $id";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);

                    echo '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById('."'info'".').innerHTML = '."''".';" style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: '.$w['zgloszenie_id'].'</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik zgłaszający</td><td>'.$w['zglaszajacyy'].'</td></tr><tr><td>Użytkownik zgłoszony</td><td>'.$w['zgloszony'].'</td></tr><tr><td>Pytanie</td><td>'.$w['tytul'].'</td></tr><tr><td>Opis</td><td>'.$w['opis'].'</td></tr><tr><td>Treść zgłoszenia</td><td>'.$w['opis_zgloszenia'].'</td></tr></table></div></div>';
                } else if ($obiekt == 2) {
                    $sql = "SELECT * FROM zgloszone_odpowiedzi WHERE odpowiedz_id = $id";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);

                    echo '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById('."'info'".').innerHTML = '."''".';" style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: '.$w['zgloszenie_id'].'</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik zgłaszający</td><td>'.$w['zglaszajacyy'].'</td></tr><tr><td>Użytkownik zgłoszony</td><td>'.$w['zgloszony'].'</td></tr><tr><td>Treść</td><td>'.$w['odpowiedz'].'</td></tr><tr><td>Treść zgłoszenia</td><td>'.$w['opis_zgloszenia'].'</td></tr></table></div></div>';
                } else if ($obiekt == 3) {
                    $sql = "SELECT * FROM zgloszone_komentarze WHERE komentarz_id = $id";
                    $wysz = mysqli_query($polaczenie, $sql);
                    $w = mysqli_fetch_assoc($wysz);

                    echo '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById('."'info'".').innerHTML = '."''".';" style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: '.$w['zgloszenie_id'].'</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik zgłaszający</td><td>'.$w['zglaszajacyy'].'</td></tr><tr><td>Użytkownik zgłoszony</td><td>'.$w['zgloszony'].'</td></tr><tr><td>Treść</td><td>'.$w['komentarz'].'</td></tr><tr><td>Treść zgłoszenia</td><td>'.$w['opis_zgloszenia'].'</td></tr></table></div></div>';
                }
            }
        }
    }

?>