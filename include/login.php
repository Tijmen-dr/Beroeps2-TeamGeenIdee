<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    // Gegevens kloppen, start de sessie
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    
                    // Automatisch doorsturen naar de homepage
                    header("location: homepage.php");
                    exit;
                } else {
                    $error = "Ongeldig wachtwoord.";
                }
            } else {
                $error = "Geen account gevonden met deze gebruikersnaam.";
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $error = "Vul alle velden in.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inloggen</title>
</head>
<body>
    <h2>Inloggen</h2>
    <p style="color:red;"><?php echo $error; ?></p>
    <form method="POST" action="">
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="username" required><br><br>
        
        <label>Wachtwoord:</label><br>
        <input type="password" name="password" required><br><br>
        
        <input type="submit" value="Inloggen">
    </form>
    <p>Nog geen account? <a href="register.php">Registreer hier</a>.</p>
</body>
</html>