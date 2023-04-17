<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if(isset($_SESSION['id'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');

    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $uzytkownik = $_SESSION['id'];
        $nazwisko = $_POST['nazwisko'];
        $ulica = $_POST['ulica'];
        $numer1 = $_POST['numer_1'];
        $numer2 = $_POST['numer_2'];
        $powiat = $_POST['powiatt'];
        $email = $_POST['email'];

        // Dodanie szczegółowych danych klienta
        if(isset($_POST['miastoo'])) {
            $miasto = $_POST['miastoo'];
            $sql = "UPDATE uzytkownicy_dane SET nazwisko='$nazwisko', email='$email', ulica='$ulica', numer_1='$numer1', numer_2='$numer2', powiat_id=$powiat, miasto = '$miasto' WHERE id = $uzytkownik";
        } else {
            $sql = "UPDATE uzytkownicy_dane SET nazwisko='$nazwisko', email='$email', ulica='$ulica', numer_1='$numer1', numer_2='$numer2', powiat_id=$powiat WHERE id = $uzytkownik";
        }
        
        // Zrealizowanie zapytania
        mysqli_query($polaczenie, $sql);

        // Zdefiniowanie zmiennych
        $kod_rabatowy = $_POST['kod_rabatowy'];
        $cena = $_POST['cenaaa'];
        $plan = $_POST['plannn'];
        $data = date('Y-m-d');
        $data_k = date('Y-m-d', strtotime($data .' +1 month'));

        // Dodanie danych zamówienia
        if ($kod_rabatowy == 'none') {
            $sql1 = "INSERT INTO zakup (uzytkownik_id, plan_id, data, data_k, cena) VALUES ($uzytkownik, $plan, '$data', '$data_k', $cena);";
        } else {
            $sql1 = "INSERT INTO zakup (uzytkownik_id, plan_id, kod, data, data_k, cena) VALUES ($uzytkownik, $plan, $kod_rabatowy, '$data', '$data_k', $cena);";
        }

        // Zrealizowanie zapytania
        mysqli_query($polaczenie, $sql1);

        // Zmiana rangi użytkownika
        $sql3 = "UPDATE uzytkownik SET ranga = 1 WHERE id = $uzytkownik AND (ranga != 2 OR ranga IS NULL)";
        mysqli_query($polaczenie, $sql3);
    }

    // Przekierowanie do strony profilu
    header('Location: ./../profil.php');
}

?>