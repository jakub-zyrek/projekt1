<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest administratorem
if (!isset($_SESSION['admin'])) {
    // Przeniesienie do strony głównej
    header("Location: ../../index.php");
} else {

    // Połączenie z bazą danych
    $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
    
    // Sprawdzenie czy nie ma przerwy technicznej 
    $sql = "SELECT * FROM aktywne_przerwy";
    $wysz = mysqli_query($polaczenie, $sql);
    if (mysqli_num_rows($wysz) > 0) {
        header("Location: ../przerwa.php");
    }
    
    // Sprawdzenie czy nie ma problemów z połączeniem
    if (!mysqli_connect_errno()) {
        // Zdefiniowanie zmiennych
        $pytanie = $_POST['pytanie'];

        // Sprawdzenie czy plik został wysłany
        if(is_uploaded_file($_FILES['zw']['tmp_name'])) {
            // Zdefiniowanie zmiennych
            $target_dir = "../../files/";
            $target_file = $target_dir.basename($_FILES["zw"]["name"]);
            $nazwa = "files/".basename($_FILES["zw"]["name"]);

            // Wysłanie pliku na serwer
            move_uploaded_file($_FILES['zw']['tmp_name'],$target_file);

            // Dodanie do bazy ścieżki do zdjęcia
            $sql = "INSERT INTO instrukcje (tytul, plik) VALUES ('$pytanie', '$nazwa')";
            mysqli_query($polaczenie, $sql);
            
            // Zdefiniowanie zmiennych
            $_SESSION['alert1'] = "<div class='alert alert-success'>Dodano instrukcje</div>";
        } else {
            // Alert o niedodaniu zdjęcia
            $_SESSION['alert1'] = "<div class='alert alert-danger'>'Nie dodano instrukcji</div>";
        }
    }
}

header("Location: ../pomoc.php");
?>