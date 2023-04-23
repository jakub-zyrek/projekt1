<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik nie jest już zalogowany
if (isset($_SESSION['zalogowany'])) {
    // Przekierowanie do strony głównej
    header("Location: ../index.php");
} else {
    // Sprawdzenie czy istnieją zmienne z formularza
    if (isset($_POST['imie']) && isset($_POST['nick']) && isset($_POST['data']) && isset($_POST['login']) && isset($_POST['haslo'])) {
        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
        // Sprawdzenie czy nie ma przerwy technicznej 
        $sql = "SELECT * FROM aktywne_przerwy";
        $wysz = mysqli_query($polaczenie, $sql);
        if (mysqli_num_rows($wysz) > 0) {
            header("Location: ../przerwa.php");
        }
    
        if (!mysqli_connect_errno()) {
            // Zdefiniowanie zmiennych
            $imie = $_POST['imie'];
            $nick = $_POST['nick'];
            $data = $_POST['data'];
            $login = $_POST['login'];
            $haslo = $_POST['haslo'];
            $haslo = md5($haslo);
            
            // Sprawdzenie powtórzenia się loginu i nicku
            $sql1 = "SELECT * FROM uzytkownik WHERE nick = '$nick'";
            $sql3 = "SELECT * FROM uzytkownik WHERE login = '$login'";
            $zapytanie1 = mysqli_query($polaczenie, $sql1);
            $zapytanie3 = mysqli_query($polaczenie, $sql3);

            if (mysqli_num_rows($zapytanie1) > 0 || mysqli_num_rows($zapytanie3) > 0) {
                // Powtórzenie
                if (mysqli_num_rows($zapytanie1) > 0) {
                    // Powtórzenie nicku
                    $_SESSION['powtorka'] = 'n';
                } else if (mysqli_num_rows($zapytanie3) > 0) {
                    // Powtórzenie loginu
                    $_SESSION['powtorka'] = 'l';
                }
            } else if (mysqli_num_rows($zapytanie1) > 0 && mysqli_num_rows($zapytanie3) > 0) {
                // Powtórzenie loginu i nicku
                $_SESSION['powtorka'] = 'w';
            } else {
                // Dodanie użytkownika
                $sql2 = "INSERT INTO uzytkownik (login, haslo, imie, nick, data_urodzenia, obraz, ranga) VALUES ('$login', '$haslo', '$imie', '$nick', '$data', 'images/user.png', 0)";
                mysqli_query($polaczenie, $sql2);
                $idd = mysqli_insert_id($polaczenie);

                // Dodanie pustych pól do kolumny z szerszymi danymi
                $sql4 = "INSERT INTO uzytkownicy_dane (id) VALUES ($idd)";
                mysqli_query($polaczenie, $sql4);

                // Informacja
                $_SESSION['dodane'] = true;
            }
        }

        // Przekierowanie do strony rejestracji
        header("Location: ./../rejestracja.php");
    }
    
}

?>