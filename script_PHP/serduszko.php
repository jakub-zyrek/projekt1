<?php
session_start();

if (isset($_SESSION['zalogowany'])) {
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    $odp = $_GET['odp'];
    $uzytkownik = $_SESSION['id'];

    if ($_GET['dod'] == 1) {
        $sql = "INSERT INTO serca (odpowiedz_id, uzytkownik_id) VALUES ($odp, $uzytkownik)";
        mysqli_query($polaczenie, $sql);
    } else if ($_GET['dod'] == 2) {
        $sql = "DELETE FROM serca WHERE odpowiedz_id = $odp AND uzytkownik_id = $uzytkownik";
        mysqli_query($polaczenie, $sql);
    }
    
} else {
    header("Location: index.php");
}

?>