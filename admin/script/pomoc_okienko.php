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
        if (isset($_GET['id'])) {
            // Deklarowanie zmiennych 
            $id = $_GET['id'];

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                // Zapytanie do bazy 
                $sql = "SELECT * FROM zgloszenia_pomoc WHERE id = $id";
                $wysz = mysqli_query($polaczenie, $sql);
                $w = mysqli_fetch_assoc($wysz);

                echo '<div class="card col-12"><div class="card-header bg-success-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById('."'info'".').innerHTML = '."''".';"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-success-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: '.$w['id'].'</h2></div><div class="card-body"><table class="table table-hover"><tr><td>Użytkownik</td><td>'.$w['zglaszajacyy'].'</td></tr><tr><td>Treść zgłoszenia</td><td>'.$w['opis'].'</td></tr></table><form action="" method="post" class="needs-validation" novalidate><textarea name="odpowiedz" id="odpowiedz" style="width: 100%; border-radius: 1vw; padding: 2%;" rows="10"></textarea><br><button class="btn btn-success w-100" type="button" onclick="pomoc_wyslij(document.getElementById('."'odpowiedz'".'), '.$w['id'].')">Wyślij</button></form></div></div>';
            }
        }
    }

?>