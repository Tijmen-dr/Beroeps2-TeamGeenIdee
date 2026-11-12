<?php
<<<<<<< HEAD


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

=======
// Fouten weergeven voor debugging
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$servername = "localhost"; // Omdat script en database op dezelfde server staan[cite: 5]
$username = "db_104081";
$password = "kaas!_!!66";
$dbname = "104081_programm2";

// Maak verbinding via MySQLi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Controleer de verbinding
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
