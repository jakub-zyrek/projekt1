<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy istnieją zmienne z adresu URL
if (isset($_GET['id']) && isset($_GET['obiekt'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Sprawdzenie czy nie ma problemów z połączeniem
    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $id = $_GET['id'];
        $o = $_GET['obiekt'];
        $opinia = $_GET['opinia'];
        $uzytkownik = $_SESSION['id'];

        // Dodanie zgloszenia
        $sql = "INSERT INTO zgloszenie (zglaszajacy, opis, data) VALUES ($uzytkownik, '$opinia', NOW());";
        mysqli_query($polaczenie, $sql);
        $zgloszenie = mysqli_insert_id($polaczenie);

        // Dodanie obiektu zgłoszenia
        if ($o == 'p') {
            $sql1 = "INSERT INTO obiekt (pytanie, zgloszenie_id) VALUES ($id, $zgloszenie)";
        } else if ($o == 'o') {
            $sql1 = "INSERT INTO obiekt (odpowiedz, zgloszenie_id) VALUES ($id, $zgloszenie)";
        } else if ($o == 'k') {
            $sql1 = "INSERT INTO obiekt (komentarz, zgloszenie_id) VALUES ($id, $zgloszenie)";
        }

        // Zrealizowanie zapytania
        mysqli_query($polaczenie, $sql1);
    }
}

?>