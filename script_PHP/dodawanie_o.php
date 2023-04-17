<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany i nie jest zbanowany
if (!isset($_SESSION['zalogowany']) || isset($_SESSION['ban'])) {
    // Przeniesienie do strony głównej
    header("Location: ../index.php");
} else {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Sprawdzenie czy nie ma problemu z połączeniem
    if (!mysqli_connect_errno()) {    
        // Definiowanie zmiennych
        $pytanie = $_POST['pytanie'];
        $tresc = $_POST['odpowiedz'];
        $uzytkownik = $_SESSION['id'];

        // Dodanie odpowiedzi
        $sql1 = "INSERT INTO `odpowiedz`(`uzytkownik_id`, `odpowiedz`, `pytanie_id`) VALUES ($uzytkownik, '$tresc', $pytanie)";
        mysqli_query($polaczenie, $sql1);

        // Przeniesienie do strony z pytaniem gdzie została dodana odpowiedź
        header("Location: ./../pytanie.php?idpytania=$pytanie");
    }
}

?>
