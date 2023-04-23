<?php
// Otwarcie sesji
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if (!isset($_SESSION['zalogowany'])) {
    // Przekierowanie do strony głównej
    header("Location: ../index.php");
} else {
    // Sprawdzenie czy istnieje zmienna z adresu URL
    if (isset($_GET['id'])) {
        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_uzytkownik', 'Użytkownik123', 'kpqmmvzc_forum');
    
        // Sprawdzenie czy nie ma przerwy technicznej 
        $sql = "SELECT * FROM aktywne_przerwy";
        $wysz = mysqli_query($polaczenie, $sql);
        if (mysqli_num_rows($wysz) > 0) {
            header("Location: ../przerwa.php");
        }
    
        // Sprawdzenie czy nie ma problemów z połączeniem
        if (!mysqli_connect_errno()) {
            // Zdefiniowanie zmiennych
            $woj = $_GET['id'];
    
            // Wyszukanie powiatów
            $sql = "SELECT * FROM powiat WHERE woj_id = $woj ORDER BY nazwa";
            $wysz = mysqli_query($polaczenie, $sql);

            // Wyświetlenie listy z powiatami
            echo "<label class='form-label'>Powiat</label>";
            echo '<div>';
                echo '<a class="btn btn-outline-dark dropdown-toggle me-2 mb-3 mb-lg-auto col-12" data-bs-toggle="dropdown" aria-expanded="false" id="pow">WYBIERZ</a>';
                echo '<ul class="dropdown-menu">';
                
                while ($w = mysqli_fetch_array($wysz)) {
                    $nazwa = $w['nazwa'];
                    echo "<li";
                    if ($w['mnpp'] == 0) {
                        echo ' onclick="powiat_n('."'$nazwa'".', '.$w['id'].')"';
                    } else if ($w['mnpp'] == 1) {
                        echo ' onclick="miasto('."'$nazwa'".', '.$w['id'].')"';
                    }
                    echo " style='cursor: pointer;'><a class='dropdown-item'>$nazwa";
                    if ($w['mnpp'] == 1) {
                        echo ' <b>(MIASTO)</b>';
                    }
                    echo "</a></li>";
                }
                
                echo '</ul>';
            echo '</div>';
        }
    }
}



?>