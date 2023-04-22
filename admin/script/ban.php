<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_z']) || isset($_SESSION['admin_u'])) {
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
            $idd = $_GET['zgloszenie'];
            $data_k = date('Y-m-d', strtotime($data .' +1 month'));

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                // Zapytanie do bazy 
                $admin = $_SESSION['id_admin'];
                $sql = "INSERT INTO `odpowiedz_zgloszenie`(`administrator_id`, `odpowiedz`, `zgloszenie_id`) VALUES ($admin, 1, $idd)";
                mysqli_query($polaczenie, $sql);
                $sql = "UPDATE uzytkownik SET zbanowany_do = '$data_k' WHERE id = $id";
                mysqli_query($polaczenie, $sql);
            }
        }
    }

?>