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

        // Sprawdzenie czy nie ma problemu z połączeniem
        if (!mysqli_connect_errno()) {    
           echo '<canvas class="my-4 w-100" id="myChart" width="900" height="250"></canvas>';

           echo "<script>
           function elo() {
            przychody('elo1', 'elo2', 2, 4)
            }
          

           </script>";
        }
    }

?>