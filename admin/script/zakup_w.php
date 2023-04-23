<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_z'])) {
        header("Location: ../brak.php");
    }

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
                $pyta = $_GET['zakup'];
                $pytaa = $pyta * 10;

                $sql1 = "SELECT COUNT(id) AS 'idd' FROM zakupy";
                $zap2 = mysqli_query($polaczenie, $sql1);
                $w3 = mysqli_fetch_array($zap2);
                $liczba = $w3['idd'];
                
                $sql = "SELECT * FROM zakupy ORDER BY data DESC LIMIT 10 OFFSET $pytaa";
                $wysz = mysqli_query($polaczenie, $sql);
                $i = 1;

                if ($liczba == 0) {
                    echo "<div class='alert alert-success'>Brak zakupów</div>";
                } else {
                    echo '<table class="table col-12 table-hover"><tr class="table-primary"><th>Lp.</th><th>Kupujący</th><th>Plan</th><th>Cena</th><th></th></tr>';
                } 

                while ($w = mysqli_fetch_array($wysz)) {
                  echo "<tr>";
                    echo "<td>$i.</td>";
                    echo "<td>".$w['imie']." ".$w['nazwisko']."</td>";
                    echo "<td>".$w['nazwa']."</td>";
                    echo "<td>".$w['data']."</td>";
                    echo '<td><button type="button" class="btn btn-outline-warning" onclick="okno('.$w['id'].')">Szczegóły</button></td>';
                  echo "</tr>";
                  $i++;
                }

                if ($liczba != 0) {
                    echo "</table>";
                    echo 'Strona: &nbsp;&nbsp;<a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">'.($pyta+1).'</a>';
                    echo '<ul class="dropdown-menu">';

                    // Zdefiniowanie zmiennych
                    $i = 0;
                    $a = 1;
                    $b = 0;
    
                    do {
                      echo "<li onclick='zakup = $b; pyt_w();'><a class='dropdown-item'>$a</a></li>";
                      $i = $i + 10;
                      $a++;
                      $b++;
                    } while ($i < $liczba);

                    echo '</ul>';
                }
            }
    }

?>