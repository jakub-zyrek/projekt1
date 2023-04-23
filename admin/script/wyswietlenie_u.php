<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_u'])) {
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
            $uzy = $_GET['uzy'];
            $uzyy = $uzy * 10;

            // Zapytanie do bazy 
            $sql = "SELECT imie, uzytkownik.id, ranga, ekspert, nazwisko, zbanowany_do FROM uzytkownik JOIN uzytkownicy_dane ON uzytkownicy_dane.id = uzytkownik.id LIMIT 10 OFFSET $uzyy;";
            $wysz = mysqli_query($polaczenie, $sql);
            $i = 1;

            // Nagłówek tabeli
            echo '<table class="table col-12 table-hover"><tr class="table-primary"><th class="col-1">Lp.</th><th class="col-2">Imię i nazwisko</th><th class="col-1">Ranga</th><th class="col-1">PREMIUM</th><th class="col-1">Polubień</th><th class="col-1">Odpowiedzi</th><th class="col-1">Zgłoszeń</th><th class="col-4"></th></tr>';

            // Wyświetlenie informacji
            while ($w = mysqli_fetch_array($wysz)) {
                // Definiowanie zmiennych
                $uzytkownik = $w['id'];
                $ekspert = $w['ekspert'];

                // Liczba odpowiedzi
                $sql1 = "SELECT COUNT(id) AS id FROM odpowiedz WHERE uzytkownik_id = $uzytkownik";
                $wysz1 = mysqli_query($polaczenie, $sql1);
                $w1 = mysqli_fetch_assoc($wysz1);
                $odpowiedzi = $w1['id'];

                // Liczba zgloszen
                $sql1 = "SELECT COUNT(id) AS id FROM zgloszenie WHERE zglaszajacy = $uzytkownik";
                $wysz1 = mysqli_query($polaczenie, $sql1);
                $w1 = mysqli_fetch_assoc($wysz1);
                $zgloszenia = $w1['id'];

                // Liczba polubień
                $sql1 = "SELECT COUNT(serca.id) AS 'id' FROM serca JOIN odpowiedz ON serca.odpowiedz_id = odpowiedz.id WHERE odpowiedz.uzytkownik_id = $uzytkownik;";
                $wysz1 = mysqli_query($polaczenie, $sql1);
                $w1 = mysqli_fetch_assoc($wysz1);
                $polubienia = $w1['id'];

                echo '<tr';

                if ($w['zbanowany_do'] > date("Y-m-d")) {
                    echo ' class="table-danger"';
                }

                echo '>';
                    echo "<td>$i</td>";

                    echo "<td><b>".$w['imie']." ".$w['nazwisko']."</b>";

                    if ($w['ekspert'] == 1) {
                        echo "<td class='text-success'>Ekspert</td>";
                    } else {
                        echo "<td>Użytkownik</td>";
                    }
                                            
                    if ($w['ranga'] == 2 || $w['ranga'] == 1) {
                        echo "<td class='text-warning'>TAK</td>";
                    } else {
                        echo "<td>NIE</td>";
                    }

                    echo "<td>$polubienia</td>";

                    echo "<td>$odpowiedzi</td>";

                    echo "<td>$zgloszenia</td>";

                    if ($w['zbanowany_do'] < date("Y-m-d") || is_null($w['zbanowany_do'])) {
                        echo '<td style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;"><button onclick="zbanuj('.$uzytkownik.')" type="button" class="btn btn-outline-danger mt-1 mt-xxl-0 mb-1 mb-xxl-0" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem"  fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16"><path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/></svg>&nbsp;Zbanuj</button>';
                    } else {
                        echo '<td style="display: flex; align-items: center; justify-content: center; flex-wrap: wrap;"><button onclick="odbanuj('.$uzytkownik.')" type="button" class="btn btn-outline-danger mt-1 mt-xxl-0 mb-1 mb-xxl-0" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.2rem"  fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16"><path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/></svg>&nbsp;Odbanuj</button>';
                    }
                    
                    echo '&nbsp; &nbsp;<button onclick="ranga('.$uzytkownik.', '.$ekspert.')" type="button" class="btn btn-outline-success mt-1 mt-xxl-0 mb-1 mb-xxl-0" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>&nbsp;Zmień rangę</button></td>';

                    echo '</tr>';

                    $i++;
            }
            echo "</table>";

            $sql1 = "SELECT COUNT(id) AS 'idd' FROM uzytkownik";
            $zap2 = mysqli_query($polaczenie, $sql1);
            $w3 = mysqli_fetch_array($zap2);
            $liczba = $w3['idd'];

            echo 'Strona: &nbsp;&nbsp;<a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " data-bs-toggle="dropdown" aria-expanded="false">'.($uzy+1).'</a>';
            echo '<ul class="dropdown-menu">';

            // Zdefiniowanie zmiennych
            $i = 0;
            $a = 1;
            $b = 0;
    
            do {
                echo "<li onclick='odpo = $b; odp_w();'><a class='dropdown-item'>$a</a></li>";
                $i = $i + 10;
                $a++;
                $b++;
            } while ($i < $liczba);
            echo '</ul>';

        }
    }

?>