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
            $tresc = $_GET['tresc'];

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                // Zapytanie do bazy 
                $admin = $_SESSION['id_admin'];
                $sql = "INSERT INTO odpowiedz_pomoc (administrator_id, pomoc_id, tresc) VALUES ($admin, $id, '$tresc');";
                mysqli_query($polaczenie, $sql);
            }
        }
    }

?>