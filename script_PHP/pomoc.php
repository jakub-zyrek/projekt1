<?php
session_start();
if (!isset($_SESSION['zalogowany'])) {
    header("Location: ../index.php");
}
if (isset($_POST['opis'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Zdefiniowanie zmiennych
    $opis = $_POST['opis'];
    $id_uzytkownika = $_SESSION['id'];

    // Dodanie zgłoszenia
    $sql = "INSERT INTO `zgloszenie`(`zglaszajacy`, `opis`) VALUES ('$id_uzytkownika', '$opis')";
    mysqli_query($polaczenie, $sql);

    header("Location: ./../pomoc.php");
}