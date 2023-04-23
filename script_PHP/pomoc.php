<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['zalogowany'])) {
    // Przekierowanie do strony głównej
    header("Location: ../index.php");
} else {
    // Sprawdzenie czy istnieją zmienne z formularza
    if (isset($_POST['opis'])) {
        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
        // Sprawdzenie czy nie ma przerwy technicznej 
        $sql = "SELECT * FROM aktywne_przerwy";
        $wysz = mysqli_query($polaczenie, $sql);
        if (mysqli_num_rows($wysz) > 0) {
            header("Location: ../przerwa.php");
        }

        // Sprawdzenie czy nie ma problemów z połączeniem
        if (!mysqli_connect_errno()) {
            // Zdefiniowanie zmiennych
            $opis = $_POST['opis'];
            $id_uzytkownika = $_SESSION['id'];

            // Dodanie zgłoszenia
            $sql = "INSERT INTO `zgloszenie_pomoc`(`zglaszajacy`, `opis`, data) VALUES ('$id_uzytkownika', '$opis', NOW())";
            mysqli_query($polaczenie, $sql);
        }

        // Przekierowanie do strony pomocy
        header("Location: ./../pomoc.php");
    }
}

?>