<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_p'])) {
        header("Location: ../brak.php");
    }

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        if (isset($_POST['odd']) && isset($_POST['odt']) && isset($_POST['dod']) && isset($_POST['dot']) && isset($_POST['opis'])) {
            // Deklarowanie zmiennych 
            $admin = $_SESSION['id_admin'];
            $odd = $_POST['odd'];
            $odt = $_POST['odt'];
            $dot = $_POST['dot'];
            $dod = $_POST['dod']; 
            $opis = $_POST['opis']; 
            
            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
    
            // Sprawdzenie czy nie ma przerwy technicznej 
            $sql = "SELECT * FROM aktywne_przerwy";
            $wysz = mysqli_query($polaczenie, $sql);
            if (mysqli_num_rows($wysz) > 0) {
                header("Location: ../przerwa.php");
            }

            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {    

                if ($odd > $dod) {
                    $_SESSION['alert_data'] = "<div class='alert alert-danger'>Źle wprowadzono wartości</div>";
                    header("Location: ../przerwa.php");
                } else if ($dod == $odd) {
                    if ($odt >= $dot) {
                        $_SESSION['alert_data'] = "<div class='alert alert-danger'>Źle wprowadzono wartości</div>";
                        header("Location: ../przerwa.php");
                    } else {
                        $sql = "INSERT INTO `przerwa`(`od`, `do`, `administrator_id`, opis) VALUES ('$odd $odt', '$dod $dot', $admin, '$opis')";
                        mysqli_query($polaczenie, $sql);
                    }
                } else {
                    $sql = "INSERT INTO `przerwa`(`od`, `do`, `administrator_id`, opis) VALUES ('$odd $odt', '$dod $dot', $admin, '$opis')";
                    mysqli_query($polaczenie, $sql);
                }
            }
        }

        header("Location: ../przerwa.php");
    }

?>