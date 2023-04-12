<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header("Location: ../index.php");
}

// Połączenie z bazą danych
$polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

if (!mysqli_connect_errno()) {
    // Definiowanie zmiennych
    $pytanie = $_POST['pytanie'];
    $tresc = $_POST['odpowiedz'];
    $uzytkownik = $_SESSION['id'];

    // Dodanie pytania
    $sql1 = "INSERT INTO `odpowiedz`(`uzytkownik_id`, `odpowiedz`, `pytanie_id`) VALUES ($uzytkownik, '$tresc', $pytanie)";
    mysqli_query($polaczenie, $sql1);

    header("Location: ./../pytanie.php?idpytania=$pytanie");
}
?>
