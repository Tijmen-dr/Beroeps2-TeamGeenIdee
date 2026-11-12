<?php


$servername = "localhost";
$username = "db_104081";
$password = "kaas!_!!66";
$dbname = "104081_programm2";


$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {

    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        $options
    );

} catch (PDOException $e) {

    error_log("Database connection error: " . $e->getMessage());

    http_response_code(500);
    die("Er kon geen verbinding worden gemaakt met de database.");

}

?>

