<?php
session_start();

// Controleer of de gebruiker is ingelogd, anders terugsturen naar login.php
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h2>Welkom op de Homepage, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>Je bent succesvol ingelogd.</p>
    <p><a href="logout.php">Uitloggen</a></p>
</body>
</html>