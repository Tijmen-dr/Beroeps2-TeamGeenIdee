<?php
// Fouten weergeven voor debugging
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$servername = "localhost"; // Omdat script en database op dezelfde server staan[cite: 5]
$username = "db_104081";
$password = "Fatih6_6!";
$dbname = "104081_programm2";

// Maak verbinding via MySQLi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controleer de verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>