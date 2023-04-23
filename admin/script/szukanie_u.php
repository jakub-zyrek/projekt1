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
        if (isset($_GET['nick'])) {
            // Deklarowanie zmiennych 
            $nick = $_GET['nick'];

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
                // Zapytanie do bazy 
                $sql = "SELECT imie, nazwisko, id, data_urodzenia FROM uzytkownikk WHERE nick = '$nick'";
                $wysz = mysqli_query($polaczenie, $sql);
                $w = mysqli_fetch_assoc($wysz);

                echo '<table style="width: 90%; margin: auto;">
                <tr>
                    <td class="text-end">Imię:&nbsp;&nbsp;</td>
                    <td><input disabled type="text" name="imie" id="imie" class="form-control" value="'.$w['imie'].'"></td>
                    <td class="text-end">Nazwisko:&nbsp;&nbsp;</td>';
                if (is_null($w['nazwisko'])) {
                    echo '<td><input type="text" name="nazwisko" id="nazwisko" class="form-control"></td>';
                } else {
                    echo '<td><input disabled value="'.$w['nazwisko'].'" type="text" name="nazwisko" id="nazwisko" class="form-control"></td>';
                }
                
                echo '<td class="text-end">Data urodzenia:&nbsp;&nbsp;</td>
                    <td><input disabled type="date" name="data" id="data" class="form-control" value="'.$w['data_urodzenia'].'"></td>
                </tr>
            </table>
            <br>
            <h4 style="text-align: center;">Uprawnienia</h4>
            <table style="margin: auto; width: 30%;">
                <tr>
                    <td><input type="hidden" name="u1" id="u1" value="0"><input type="hidden" name="uzy" id="uzy" value="'.$w['id'].'"></td>
                    <td id="t1" onclick="zmiana(1)" style="text-align: center; cursor: pointer; padding: 3%;">Zarządzanie użytkownikami</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="u2" id="u2" value="0"></td>
                    <td id="t2" onclick="zmiana(2)" style="text-align: center; cursor: pointer; padding: 3%;">Zarządzanie administratorami</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="u3" id="u3" value="0"></td>
                    <td id="t3" onclick="zmiana(3)" style="text-align: center; cursor: pointer; padding: 3%;">Zarządzanie zgłoszeniami</td>
                </tr>
                <tr>
                    <td><input type="hidden" name="u4" id="u4" value="0"></td>
                    <td id="t4" onclick="zmiana(4)" style="text-align: center; cursor: pointer; padding: 3%;">Zarządzanie przerwami technicznymi</td>
                </tr>
            </table>
            <br>
            <div style="width: 100%; text-align: center;">
            <button onclick="dodawanie_u();" type="button" class="btn btn-primary" style="margin: auto; width: 40%;">Dodaj użytkownika</button>
        </div>';

            }
        }
    }

?>