<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['zalogowany'])) {
    header("Location: ../index.php");
} else {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
    // Sprawdzenie czy nie ma przerwy technicznej 
    $sql = "SELECT * FROM aktywne_przerwy";
    $wysz = mysqli_query($polaczenie, $sql);
    if (mysqli_num_rows($wysz) > 0) {
        header("Location: ../przerwa.php");
    }

    // Sprawdzenie czy nie ma problemu z połączeniem
    if(!mysqli_connect_errno()) {
        // Sprawdzenie czy istnieją zmienne z formularza
        if (isset($_POST['stare']) && isset($_POST['nowe'])) {
            // Definiowanie zmiennych
            $uzytkownik = $_SESSION['id'];
            $stare = $_POST['stare'];
            $nowe = $_POST['nowe'];
    
            // Szyfrowanie haseł
            $stare = md5($stare);
            $nowe = md5($nowe);
    
            // Sprawdzenie czy stare hasło jest poprawnie wpisane
            $sql = "SELECT * FROM uzytkownik WHERE id = $uzytkownik AND haslo = '$stare'";
            $wysz = mysqli_query($polaczenie, $sql);
    
            if (mysqli_num_rows($wysz) > 0) {
                // Zmiana hasła
                $sql1 = "UPDATE uzytkownik SET haslo = '$nowe' WHERE id = $uzytkownik";
                mysqli_query($polaczenie, $sql1);
                $_SESSION['alerth'] = "<div class='alert alert-success col-12'>Zmieniono hasło</div>";
            } else {
                // Alert o nie zmianie hasła
                $_SESSION['alerth'] = "<div class='alert alert-danger col-12'>Stare hasło jest niepoprawne</div>";
            }
        }
    
        // Przekierowanie do strony profilu
        header("Location: ../profil.php");
    }
}


?>