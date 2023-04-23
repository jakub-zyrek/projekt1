<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['zalogowany'])) {
    // Przeniesienie do strony głównej
    header("Location: ../index.php");
} else {
    // Sprawdzenie czy istnieją zmienne z adresu URL
    if(isset($_GET['kod']) && isset($_GET['cena'])) {
        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
        // Sprawdzenie czy nie ma przerwy technicznej 
        $sql = "SELECT * FROM aktywne_przerwy";
        $wysz = mysqli_query($polaczenie, $sql);
        if (mysqli_num_rows($wysz) > 0) {
            header("Location: ../przerwa.php");
        }

        // Zdefiniowanie zmiennych
        $kod = $_GET['kod'];
        $cena = $_GET['cena'];

        // Przeszukiwanie tabeli z kodami
        $sql = "SELECT * FROM kod_rabatowy WHERE kod = '$kod'";
        $wysz = mysqli_query($polaczenie, $sql);

        if (mysqli_num_rows($wysz) > 0) {
            $wynik = mysqli_fetch_array($wysz);
            if (!is_null($wynik['znizka_pro'])) {
                // Operacje gdy zniżka jest procentowa
                    // Zdefiniowanie zmiennych
                    $znizka = $wynik['znizka_pro'];
                    $id = $wynik['id'];

                    // Wyświetlenie zniżki
                    echo '<div style="display: flex; justify-content: end;"><p>ZNIŻKA</p>&nbsp;<p class="text-success">- '.$znizka.' %</p></div>';

                    // Obliczenie ceny po zniżce
                    $cena_z = $cena - ($cena * ($znizka / 100));
                    if ($cena_z < 0) {
                        $cena_z = 0;
                    }

                    // Wyświetlenie ceny po zniżce
                    echo '<div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;"><h5>ZE ZNIŻKĄ:</h5><h5><span id="ceni">'.$cena_z.'</span> zł</h5></div>'; 
            } else if (!is_null($wynik['znizka_zl'])) {
                // Operacje gdy zniżka jest w złotówkach
                    // Definiowanie zmiennych
                    $znizka = $wynik['znizka_zl'];
                    $id = $wynik['id'];

                    // Wyświetlanie zniżki
                    echo '<div style="display: flex; justify-content: end;"><p>ZNIŻKA</p>&nbsp;<p class="text-success">- '.$znizka.' zł</p></div>';

                    // Obliczanie ceny po zniżce 
                    $cena_z = $cena - $znizka;
                    if ($cena_z < 0) {
                        $cena_z = 0;
                    }

                    // Wyświetlanie ceny po zniżce
                    echo '<div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;"><h5>ZE ZNIŻKĄ:</h5><h5><span id="ceni">'.$cena_z.'</span> zł</h5></div>';
            }

            // Zmiana wartości pól formularza z ceną i kodem
            echo '<input type="hidden" name="kod_rabatowy" id="kod_rabatowy" value="'.$id.'">
            <input type="hidden" name="cenaaa" value="'.$cena_z.'" id="cenaaa">';
        } else {
            // Jeżeli nie ma kodów rabatowych, pola formularza mają wartości takie jak przed operacją
            echo '<input type="hidden" name="kod_rabatowy" id="kod_rabatowy" value="none">
            <input type="hidden" name="cenaaa" value="'.$_GET['cena'].'" id="cenaaa">';
        }
    }
}

?>