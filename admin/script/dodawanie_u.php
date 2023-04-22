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
        if (isset($_GET['id']) && isset($_GET['nazwisko']) && isset($_GET['admin']) && isset($_GET['uzytkownicy']) && isset($_GET['przerwy']) && isset($_GET['zgloszenia'])) {
            // Deklarowanie zmiennych 
            $id = $_GET['id'];
            $nazwisko = $_GET['nazwisko'];
            $admin = $_GET['admin'];
            $uzytkownicy = $_GET['uzytkownicy'];
            $przerwy = $_GET['przerwy'];
            $zgloszenia = $_GET['zgloszenia'];

            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    
                // Zapytanie do bazy 
                $sql = "UPDATE uzytkownicy_dane SET nazwisko = '$nazwisko' WHERE id = $id";
                mysqli_query($polaczenie, $sql);
                $sql = "INSERT INTO administratorzy (uzytkownik_id, admin, uzytkownicy, zgloszenia, przerwy) VALUES ($id, $admin, $uzytkownicy, $zgloszenia, $przerwy)";
                mysqli_query($polaczenie, $sql);
            }
        }
    }

?>