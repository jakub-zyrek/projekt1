<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik wcześniej się nie zalogował
if (isset($_SESSION['zalogowany'])) {
    // Przekierowanie do strony głównej
    header("Location: ../index.php");
}
if (isset($_POST['login']) && isset($_POST['haslo'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
    // Sprawdzenie czy nie ma przerwy technicznej 
    $sql = "SELECT * FROM aktywne_przerwy";
    $wysz = mysqli_query($polaczenie, $sql);
    if (mysqli_num_rows($wysz) > 0) {
        header("Location: ../przerwa.php");
    }

    // Sprawdzenie czy nie ma problemu z połączeniem
    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];
        $haslo = md5($haslo);
        
        // Sprawdzenie czy użytkownik istenieje w bazie
        $sql1 = "SELECT * FROM uzytkownik WHERE login = '$login' AND haslo = '$haslo' AND ranga != 4";
        $zapytanie1 = mysqli_query($polaczenie, $sql1);
        
        if (mysqli_num_rows($zapytanie1) > 0) {
            $wiersz = mysqli_fetch_array($zapytanie1);

            // Definiowanie zmiennych sesyjnych
            $_SESSION['zalogowany'] = true;
            $_SESSION['id'] = $wiersz['id'];
            $_SESSION['login'] = $wiersz['login'];
            $_SESSION['imie'] = $wiersz['imie'];
            $_SESSION['nick'] = $wiersz['nick'];
            $_SESSION['ranga'] = $wiersz['ranga'];
            $_SESSION['data'] = $wiersz['data_urodzenia'];
            $_SESSION['obraz'] = $wiersz['obraz'];
            $_SESSION['obraz_admin'] = "../".$wiersz['obraz'];

            // Sprawdzenie czy użytkownik jest administratorem
            $uzytkownik = $wiersz['id'];
            $sql = "SELECT id, id_administratora, uzytkownicy, admin, przerwy, zgloszenia FROM admin WHERE id = $uzytkownik AND zawieszony IS NULL";
            $wysz = mysqli_query($polaczenie, $sql);
            if (mysqli_num_rows($wysz) > 0) {
                $_SESSION['admin'] = true;
                $w = mysqli_fetch_assoc($wysz);
                $_SESSION['id_admin'] = $w['id_administratora'];
                if ($w['uzytkownicy'] != 1) {
                    $_SESSION['admin_u'] = true;
                }
                if ($w['admin'] != 1) {
                    $_SESSION['admin_a'] = true;
                }
                if ($w['przerwy'] != 1) {
                    $_SESSION['admin_p'] = true;
                }
                if ($w['zgloszenia'] != 1) {
                    $_SESSION['admin_z'] = true;
                }
            }

            // Sprawdzenie czy użytkownik jest zbanowany
            if ($wiersz['zbanowany_do'] >= date("Y-m-d")) {
                $_SESSION['ban'] = true;
            }

            // Przekierowanie do strony głównej
            header("Location: ./../index.php");
        } else {
            // Zdefiniowanie zmiennej z błędem
            $_SESSION['blad'] = true;

            // Przekierowanie do strony głównej
            header("Location: ./../logowanie.php");
        }
    }
    
    // Sprawdzenie czy nie ma przerwy technicznej 
    $sql = "SELECT * FROM aktywne_przerwy";
    $wysz = mysqli_query($polaczenie, $sql);
    if (mysqli_num_rows($wysz) > 0) {
    header("Location: ../przerwa.php");
    }
}

?>