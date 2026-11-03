<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
$servername = "localhost"; // of localhost
$username = "db_104081";
$password = "Fatih6_6!";
$database = "104081_programm2";

// Opties voor PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Fouten gooien als uitzonderingen
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Fetch modus
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Echte prepared statements
];

try {
    $con = new PDO(
        "mysql:host=$servername;dbname=$database",
        $username,
        $password,
        $options
    );

    // set the PDO error mode to exception
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected successfully";
} catch (PDOException $e) {
    // ...
  echo "Connection failed: " . $e->getMessage();
}

