<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (isset($_SESSION['zalogowany'])) {
    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
    // Sprawdzenie czy nie ma problemów z połączeniem
    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $uzytkownik = $_SESSION['id'];

        // Sprawdzenie czy plik został wysłany
        if(is_uploaded_file($_FILES['zw']['tmp_name'])) {
            // Zdefiniowanie zmiennych
            $target_dir = "../images/";
            $target_file = $target_dir.basename($_FILES["zw"]["name"]);
            $nazwa = "images/".basename($_FILES["zw"]["name"]);

            // Wysłanie pliku na serwer
            move_uploaded_file($_FILES['zw']['tmp_name'],$target_file);

            // Dodanie do bazy ścieżki do zdjęcia
            $sql = "UPDATE uzytkownik SET obraz = '$nazwa' WHERE id = $uzytkownik;";
            mysqli_query($polaczenie, $sql);
            
            // Zdefiniowanie zmiennych
            $_SESSION['obraz'] = $nazwa;
            $_SESSION['alert'] = "<div class='alert alert-success'>Dodano zdjęcie</div>";
        } else {
            // Alert o niedodaniu zdjęcia
            $_SESSION['alert'] = "<div class='alert alert-danger'>'Nie dodano zdjęcia</div>";
        }
    }

    // Przekierowanie do strony profilu
    header("Location: ../profil.php");
} else {
    // Przekierowanie do strony głównej
    header("Location ../index.php");
}
?>