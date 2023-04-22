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
            
            // Sprawdzenie czy nie ma problemu z połączeniem
            if (!mysqli_connect_errno()) {   
                $kome = $_GET['komen'];
                $komee = $kome * 10;

                $sql1 = "SELECT COUNT(zgloszenie_id) AS 'idd' FROM zgloszone_komentarze";
                $zap2 = mysqli_query($polaczenie, $sql1);
                $w3 = mysqli_fetch_array($zap2);
                $liczba = $w3['idd'];

                $sql = "SELECT * FROM zgloszone_komentarze ORDER BY data LIMIT 10 OFFSET $komee";
                $wysz = mysqli_query($polaczenie, $sql);
                $i = 1;

                if ($liczba == 0) {
                    echo "<div class='alert alert-success'>Brak zgłoszeń</div>";
                } else {
                    echo '<table class="table col-12 table-hover"><tr class="table-primary"><th>Lp.</th><th>Od</th><th>Dla</th><th>Data</th><th></th></tr>';
                } 

                while ($w = mysqli_fetch_array($wysz)) {
                  echo "<tr>";
                    echo "<td>$i.</td>";
                    echo "<td>".$w['zglaszajacyy']."</td>";
                    echo "<td>".$w['zgloszony']."</td>";
                    echo "<td>".$w['data']."</td>";
                    echo '<td><button type="button" class="btn btn-outline-warning" onclick="okno('.$w['komentarz_id'].' ,3)">Szczegóły</button>

                    &nbsp;&nbsp;
  
                    <button type="button" class="btn btn-outline-primary dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">
                      <span>Czynności</span>
                      <ul class="dropdown-menu">
                        <li>
                          <a class="dropdown-item" onclick="ban('.$w['id_zgloszonego'].', '.$w['zgloszenie_id'].')">Zbanuj użytkownika: '.$w['zgloszony'].'</a>
                        </li>
                        <li>
                          <a class="dropdown-item" onclick="kome_u('.$w['zgloszenie_id'].')">Zignoruj zgłoszenie</a>
                        </li>
                        <li>
                          <a class="dropdown-item" onclick="ostrzezenie('.$w['id_zgloszonego'].', '.$w['zgloszenie_id'].')">Wyślij ostrzeżenie</a>
                        </li>
                      </ul>
                    </button></td>';
                  echo "</tr>";
                  $i++;
                }

                if ($liczba != 0) {
                    echo "</table>";
                    echo 'Strona: &nbsp;&nbsp;<a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">'.($kome+1).'</a>';
                    echo '<ul class="dropdown-menu">';
                      
                    // Zdefiniowanie zmiennych
                    $i = 0;
                    $a = 1;
                    $b = 0;
    
                    do {
                      echo "<li onclick='komen = $b; kome_w();'><a class='dropdown-item'>$a</a></li>";
                      $i = $i + 10;
                      $a++;
                      $b++;
                    } while ($i < $liczba);

                    echo '</ul>';
                }
            }
    }

?>