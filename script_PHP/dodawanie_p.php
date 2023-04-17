<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany i nie jest zbanowany
if (!isset($_SESSION['zalogowany']) && isset($_SESSION['ban'])) {
    // Przeniesienie do strony głównej
    header("Location: ../index.php");
} else {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Sprawdzenie czy nie ma problemu z połączeniem
    if (!mysqli_connect_errno()) {
        // Definiowanie zmiennych
        $id_uzytkownika = $_SESSION['id'];
        $tyt = $_POST['tyt'];
        $kat = $_POST['kat'];
        $opis = $_POST['opis'];

        // Dodanie pytania
        $sql1 = "INSERT INTO `pytanie`(`tytul`, `kategoria_id`, `opis`, `uzytkownik_id`) VALUES ('$tyt', $kat, '$opis', $id_uzytkownika)";
        mysqli_query($polaczenie, $sql1);
        $a = mysqli_insert_id($polaczenie);

        // Przeniesienie do strony z pytaniem
        header("Location: ./../pytanie.php?idpytania=$a");
    }
}

?>
