<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy użytkownik jest administratorem
    if (!isset($_SESSION['admin']) && !isset($_SESSION['id_admin'])) {
        // Przeniesienie do strony głównej
        header("Location: ../../index.php");
    } else {
        // Deklarowanie zmiennych 
        $id = $_SESSION['id_admin'];

        // Połączenie z bazą danych
        $polaczenie = mysqli_connect('localhost', 'kpqmmvzc_administrator', 'Admin123', 'kpqmmvzc_forum');
            
        // Sprawdzenie czy nie ma problemu z połączeniem
        if (!mysqli_connect_errno()) {    
            // Przeładowywanie 
            $sql = "SELECT id_administratora, uzytkownicy, admin, przerwy, zgloszenia FROM admin WHERE id_administratora = $id";
            $wysz = mysqli_query($polaczenie, $sql);
            if (mysqli_num_rows($wysz) > 0) {
                $w = mysqli_fetch_assoc($wysz);
                if ($w['uzytkownicy'] != 1) {
                    $_SESSION['admin_u'] = true;
                } else {
                    unset($_SESSION['admin_u']);
                }
                if ($w['admin'] != 1) {
                    $_SESSION['admin_a'] = true;
                } else {
                    unset($_SESSION['admin_a']);
                }
                if ($w['przerwy'] != 1) {
                    $_SESSION['admin_p'] = true;
                } else {
                    unset($_SESSION['admin_p']);
                }
                if ($w['zgloszenia'] != 1) {
                    $_SESSION['admin_z'] = true;
                } else {
                    unset($_SESSION['admin_z']);
                }
            }
        }
        
    }   

    header("Location: ../index.php");

?>