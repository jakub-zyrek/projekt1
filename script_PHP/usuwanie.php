<?php
session_start();

if (isset($_SESSION['zalogowany'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Sprawdzenie czy nie ma problemów z połączeniem
    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $uzytkownik = $_SESSION['id'];

        // Usunięcie użytkownika
        $sql1 = "UPDATE uzytkownik SET nick = 'Użytkownik usunięty', obraz = 'images/usuniety.jpeg', ranga = 4, login = 'no', haslo = 'no' WHERE id = $uzytkownik";
        mysqli_query($polaczenie, $sql1);
    }

    // Przekierowanie do strony z wylogowaniem
    header("Location: wyloguj.php");
} else {
    header("Location: ../index.php");
}

?>