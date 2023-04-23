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
    
            // Sprawdzenie czy nie ma przerwy technicznej 
            $sql = "SELECT * FROM aktywne_przerwy";
            $wysz = mysqli_query($polaczenie, $sql);
            if (mysqli_num_rows($wysz) > 0) {
                header("Location: ../przerwa.php");
            }
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                // Zapytanie do bazy 
                $sql = "DELETE FROM zgloszenie_pomoc WHERE id = $id";
                mysqli_query($polaczenie, $sql);
            }
        }
    }

?>