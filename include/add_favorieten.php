
<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../HTML/login.php");
    exit();
}

require "config.php";

$user_id = $_SESSION['id'];

$recept_id = $_POST['recept_id'] ?? null;

if (!$recept_id || !filter_var($recept_id, FILTER_VALIDATE_INT)) {
    die("Ongeldig recept.");
}

try {

    $check = $conn->prepare(
        "SELECT id FROM favorieten
         WHERE user_id = ? AND recept_id = ?"
    );

    $check->execute([$user_id, $recept_id]);

    if (!$check->fetch()) {

        $stmt = $conn->prepare(
            "INSERT INTO favorieten (user_id, recept_id)
             VALUES (?, ?)"
        );

        $stmt->execute([$user_id, $recept_id]);
    }

    header("Location: ../HTML/recepten.php");
    exit();

} catch (PDOException $e) {

    error_log($e->getMessage());
    die("Er ging iets mis bij het toevoegen van je favoriet.");

}

?>

