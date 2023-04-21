<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        if (isset($_POST['odd']) && isset($_POST['odt']) && isset($_POST['dod']) && isset($_POST['dot'])) {
            // Deklarowanie zmiennych 
            $admin = $_SESSION['id_admin'];
            $odd = $_POST['odd'];
            $odt = $_POST['odt'];
            $dot = $_POST['dot'];
            $dod = $_POST['dod']; 
            
            // Połączenie z bazą danych
            $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');

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
                        $sql = "INSERT INTO `przerwa`(`od`, `do`, `administrator_id`) VALUES ('$odd $odt', '$dod $dot', $admin)";
                        mysqli_query($polaczenie, $sql);
                    }
                } else {
                    $sql = "INSERT INTO `przerwa`(`od`, `do`, `administrator_id`) VALUES ('$odd $odt', '$dod $dot', $admin)";
                    mysqli_query($polaczenie, $sql);
                }
            }
        }

        header("Location: ../przerwa.php");
    }

?>