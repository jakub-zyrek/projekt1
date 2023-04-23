<?php
// Otwarcie sesji
session_start();

if (isset($_SESSION['zalogowany']) && !isset($_SESSION['ban'])) {
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
        $odp = $_GET['odp'];
        $uzytkownik = $_SESSION['id'];
        $tresc = $_GET['tresc'];

        // Wysłanie zapytania
        $sql = "INSERT INTO komentarze (odpowiedz_id, uzytkownik_id, komentarz) VALUES ($odp, $uzytkownik, '$tresc')";
        mysqli_query($polaczenie, $sql);
    }

} else {
    // Gdy niezalogowany lub zabnowany przenieś do strony głównej
    header("Location: ../index.php");
}

?>