<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (isset($_SESSION['zalogowany'])) {
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

        // Dodanie lub usunięcie polubienia
        if ($_GET['dod'] == 1) {
            // Dodanie polubienia
            $sql = "INSERT INTO serca (odpowiedz_id, uzytkownik_id) VALUES ($odp, $uzytkownik)";
            mysqli_query($polaczenie, $sql);
        } else if ($_GET['dod'] == 2) {
            // Usunięcie polubienia
            $sql = "DELETE FROM serca WHERE odpowiedz_id = $odp AND uzytkownik_id = $uzytkownik";
            mysqli_query($polaczenie, $sql);
        }
    }
}

?>