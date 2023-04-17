<?php
// Otwarcie sesji
session_start();

// Usunięcie sesji
$_SESSION = array();

// Przekierowanie do strony głównej
header("Location: ../index.php");
?>