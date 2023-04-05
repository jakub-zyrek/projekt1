<?php
session_start();
if (isset($_SESSION['zalogowany'])) {
    header("Location: index.php");
}
if (isset($_POST['imie']) && isset($_POST['nick']) && isset($_POST['data']) && isset($_POST['login']) && isset($_POST['haslo'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    // Zdefiniowanie zmiennych
    $imie = $_POST['imie'];
    $nick = $_POST['nick'];
    $data = $_POST['data'];
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    $haslo = md5($haslo);
    
    // Sprawdzenie powtórzenia się loginu i hasła
    $sql1 = "SELECT * FROM uzytkownik WHERE nick = '$nick'";
    $sql3 = "SELECT * FROM uzytkownik WHERE login = '$login'";
    $zapytanie1 = mysqli_query($polaczenie, $sql1);
    $zapytanie3 = mysqli_query($polaczenie, $sql3);
    if (mysqli_num_rows($zapytanie1) > 0 || mysqli_num_rows($zapytanie3) > 0) {
        // Błąd gdy powtórzy się login
        if (mysqli_num_rows($zapytanie1) > 0) {
            $_SESSION['powtorka'] = 'n';
        } else if (mysqli_num_rows($zapytanie3) > 0) {
            $_SESSION['powtorka'] = 'l';
        }
    } else if (mysqli_num_rows($zapytanie1) > 0 && mysqli_num_rows($zapytanie3) > 0) {
        $_SESSION['powtorka'] = 'w';
    } else {
        // Dodanie użytkownika
        $sql2 = "INSERT INTO uzytkownik (login, haslo, imie, nick, data_urodzenia) VALUES ('$login', '$haslo', '$imie', '$nick', '$data')";
        mysqli_query($polaczenie, $sql2);
        $_SESSION['dodane'] = true;
    }
    header("Location: ./../rejestracja.php");
}

?>