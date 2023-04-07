<?php
$q = $_GET["q"];
$q = str_replace("'", "&#8216;", $q);
$q = str_replace('"', "&#34;", $q);


$polaczenie = mysqli_connect('localhost', 'root', 'Strumien1', 'kpqmmvzc_forum');

$sql = "INSERT INTO kategorie (nazwa) VALUES ('$q');";
$wynik = mysqli_query($polaczenie, $sql);

?>