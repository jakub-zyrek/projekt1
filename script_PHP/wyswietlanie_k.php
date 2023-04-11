<?php
session_start();

$polaczenie = mysqli_connect('localhost', 'root', 'Strumien1', 'kpqmmvzc_forum');

$odp = $_GET['odp'];
$sql = "SELECT * FROM komentarze2 WHERE odpowiedz_id = $odp";
$zap = mysqli_query($polaczenie, $sql);


echo "<div class='card-body' style='padding-left: 5%; background-color: white; border-radius: 1vw;'><div style='margin-left: 3%;'>";

while ($w = mysqli_fetch_array($zap)) {
    $id = $w['id'];
    $komentarz = $w['komentarz'];
    $nick = $w['nick'];
    echo "<div id='k$id' style='display: flex; justify-content: space-between; align-items: center;'>
    <span style='flex-grow: 5;'>
      <b>$nick:</b>
      &nbsp;&nbsp; $komentarz
    </span>
    <button id='kom' type='button' class='btn btn-lg btn-outline-danger' style=' display: flex; justify-content: center; align-items: normal; font-size: 0.5rem;' onclick='document.getElementById(essa).innerHTML = bycz; var a = document.getElementById(".'"kom"'."); document.getElementById(essa).style.top = (a.offsetTop + a.offsetTop + a.offsetTop) + px;'>
      <svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem;' fill='currentColor' class='bi bi-flag-fill' viewBox='0 0 16 16'>
        <path d='M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001'/>
      </svg>
    </button>
  </div><br>";
}

if (isset($_SESSION['zalogowany'])) {
  $uzytkownik = $_SESSION['nick'];
  echo "<form method='get' onsubmit='return komentarz(this, $odp)' class='needs-validation col-12 d-flex flex-wrap' novalidate>
<span style='display: flex; align-items: baseline;' class='col-12 col-xl-10'>
    <b>$uzytkownik:&nbsp;&nbsp;</b>
    <input class='form-control' name='q' type='text' placeholder='Wprowadź komentarz' required style='border: none; border-bottom: black 1px solid; border-radius: 0px; outline: none; width: max-content;'>
</span>
                
<button type='submit' class='btn btn-outline-dark text-center col-12 col-xl-2 mt-3 mt-xl-0' style='flex-grow: 2; display: flex; justify-content: center; align-items: normal; font-size: 0.5rem; padding: 10px;'>
    <svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem;' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'>
        <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
    </svg>
</button>
</form>";
} else {
  echo "<div class='alert alert-danger'>Aby dodać komentarz musisz być zalogowany (<a href='logowanie.php'>zaloguj się</a>)</div>";
}


echo "</div></div>";

?>