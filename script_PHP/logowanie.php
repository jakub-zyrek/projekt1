<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: index.php");
}
if (isset($_POST['login']) && isset($_POST['haslo'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Zdefiniowanie zmiennych
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo = md5($haslo);
    
    // Sprawdzenie powtórzenia się loginu i hasła
    $sql1 = "SELECT * FROM uzytkownik WHERE login = '$login' AND haslo = '$haslo'";
    $zapytanie1 = mysqli_query($polaczenie, $sql1);
    if (mysqli_num_rows($zapytanie1) > 0) {
        // Zalogowano
        $wiersz = mysqli_fetch_array($zapytanie1);
        $_SESSION['zalogowany'] = true;
        $_SESSION['id'] = $wiersz['id'];
        $_SESSION['imie'] = $wiersz['imie'];
        $_SESSION['nick'] = $wiersz['nick'];
        $_SESSION['data'] = $wiersz['data_urodzenia'];
        header("Location: ./../index.php");
    } else {
        // Błędny login lub hasło
        $_SESSION['blad'] = true;
        header("Location: ./../logowanie.php");
    }
}

?>