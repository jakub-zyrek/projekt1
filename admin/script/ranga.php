<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        if (isset($_GET['id']) && isset($_GET['ranga'])) {
            // Deklarowanie zmiennych 
            $id = $_GET['id'];
            $ranga = $_GET['ranga'];

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    

                if ($ranga == 1) {
                    // Zapytanie do bazy 
                    $sql = "UPDATE uzytkownik SET ekspert = NULL WHERE id = $id";
                } else {
                    // Zapytanie do bazy 
                    $sql = "UPDATE uzytkownik SET ekspert = 1 WHERE id = $id";
                }

                mysqli_query($polaczenie, $sql);
            }
        }
    }

?>