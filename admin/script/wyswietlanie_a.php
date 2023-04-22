<?php
    // Otwarcie sesji
    session_start();

    // Sprawdzenie czy ma uprawnienia 
    if (isset($_SESSION['admin_a'])) {
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

            // Zapytanie do bazy 
            $sql = "SELECT * FROM admin";
            $wysz = mysqli_query($polaczenie, $sql);
            $i = 1;

            // Nagłówek tabeli
            echo '<tr class="table-primary"><th>Lp.</th><th>Imię</th><th>Nazwisko</th><th>Login</th><th></th></tr>';

            // Wyświetlenie informacji
            while ($w = mysqli_fetch_array($wysz)) {
                // Deklarowanie zmiennych
                $id = $w['id_administratora'];

                // Wyświetlanie 
                echo "<tr";
                if ($w['zawieszony'] == 1) {
                    echo " class='table-danger'";
                }
                echo ">";
                    echo "<td>".$i.".</td>";
                    echo "<td>".$w['imie']."</td>";
                    echo "<td>".$w['nazwisko']."</td>";
                    echo "<td>".$w['nick']."</td>";
                    if ($w['id'] == $_SESSION['id']) {
                        echo '<td style="text-align: center; display: flex; align-items: center; justify-content: space-evenly; flex-wrap: nowrap;"><button disabled type="button" class="btn btn-outline-danger" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/></svg>&nbsp;Usuń</button>&nbsp;<button disabled type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/></svg>&nbsp;Zawieś</button></td>';
                    } else {
                        echo '<td style="text-align: center; display: flex; align-items: center; justify-content: space-evenly; flex-wrap: nowrap;"><button onclick="admin_usun('.$id.')" type="button" class="btn btn-outline-danger" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"/><path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708Z"/></svg>&nbsp;Usuń</button>&nbsp;';

                        if ($w['zawieszony'] == 1) {
                            echo '<button onclick="admin_odwies('.$id.')" type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/></svg>&nbsp;Odwieś</button>';
                        } else {
                            echo '<button onclick="admin_zawies('.$id.')" type="button" class="btn btn-outline-dark" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap;"><svg xmlns="http://www.w3.org/2000/svg" style="width: 1.3rem;" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16"><path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/></svg>&nbsp;Zawieś</button>';
                        }
                            
                        echo '</td>';
                    }
                echo "</tr>";
                $i++;
            }
        }
    }

?>