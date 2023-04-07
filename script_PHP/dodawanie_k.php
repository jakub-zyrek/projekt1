<?php
session_start();

if (isset($_SESSION['zalogowany'])) {
    $polaczenie = mysqli_connect('localhost', 'root', 'Strumien1', 'kpqmmvzc_forum');

    $odp = $_GET['odp'];
    $uzytkownik = $_SESSION['id'];
    $tresc = $_GET['tresc'];

    $sql = "INSERT INTO komentarze (odpowiedz_id, uzytkownik_id, komentarz) VALUES ($odp, $uzytkownik, '$tresc')";
    mysqli_query($polaczenie, $sql);
} else {
    header("Location: index.php");
}

?>