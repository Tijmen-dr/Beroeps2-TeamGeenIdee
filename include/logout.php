<?php
session_start();
// Wis alle sessie-variabelen
$_SESSION = array();
// Vernietig de sessie
session_destroy();
// Stuur terug naar de homepage (in de HTML-map)
header("location: ../HTML/homepage.php");
exit;
?>