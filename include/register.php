<?php
// Verbind met je database via je config-bestand (aangepast op je mapstructuur)
include 'config.php'; // Of '../config.php' afhankelijk van waar dit bestand staat

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['psw']); // Komt overeen met name="psw" in je HTML

    if (!empty($email) && !empty($username) && !empty($password)) {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashed_password);
            
            if (mysqli_stmt_execute($stmt)) {
                // Registratie gelukt! Stuur direct door naar de homepage of inlogpagina
                header("location: HTML/homepage.html"); // Of naar je inlogpagina
                exit;
            } else {
                $error = "Fout: Deze gebruikersnaam of e-mailadres bestaat al.";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $error = "Vul alle velden in.";
    }
}
?>