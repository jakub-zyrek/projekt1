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
                $pomo = $_GET['pomo'];
                $pomoo = $pomo * 10;

                $sql1 = "SELECT COUNT(id) AS 'idd' FROM pomoc";
                $zap2 = mysqli_query($polaczenie, $sql1);
                $w3 = mysqli_fetch_array($zap2);
                $liczba = $w3['idd'];
                
                $sql = "SELECT * FROM pomoc LIMIT 10 OFFSET $pomoo";
                $wysz = mysqli_query($polaczenie, $sql);
                $i = 1;
                
                if ($liczba == 0) {
                    echo "<div class='alert alert-success'>Brak pytań w zakładce</div>";
                } else {
                    echo '<table class="table col-12 table-hover"><tr class="table-primary"><th>Lp.</th><th>Pytanie</th><th>Odpowiedź</th><th></th></tr>';
                } 

                while ($w = mysqli_fetch_array($wysz)) {
                  echo "<tr>";
                    echo "<td>$i.</td>";
                    echo "<td>".$w['pytanie']."</td>";
                    echo "<td>".$w['odpowiedz']."</td>";
                    echo '<td style="width: min-content; text-align: center;"><button type="button" class="btn btn-outline-danger" onclick="pomoc_u('.$w['id'].')">Usuń</button></td>';
                  echo "</tr>";
                  $i++;
                }

                if ($liczba != 0) {
                    echo "</table>";
                    echo 'Strona: &nbsp;&nbsp;<a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">'.($pomo+1).'</a>';
                    echo '<ul class="dropdown-menu">';

                    // Zdefiniowanie zmiennych
                    $i = 0;
                    $a = 1;
                    $b = 0;
    
                    do {
                      echo "<li onclick='pomo = $b; pomoc_w();'><a class='dropdown-item'>$a</a></li>";
                      $i = $i + 10;
                      $a++;
                      $b++;
                    } while ($i < $liczba);

                    echo '</ul>';
                }
            }
    }

?>