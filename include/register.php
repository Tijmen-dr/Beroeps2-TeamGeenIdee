<?php
<<<<<<< HEAD
session_start();
include 'config.php'; 
=======
// Verbind met je database via je config-bestand (aangepast op je mapstructuur)
include 'config.php'; // Of '../config.php' afhankelijk van waar dit bestand staat
>>>>>>> 496602a618a5f9ab4793d91ce15abd3a1c403d70

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['psw'] ?? '');
=======
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = trim($_POST['psw']); // Komt overeen met name="psw" in je HTML
>>>>>>> 496602a618a5f9ab4793d91ce15abd3a1c403d70

    if (!empty($email) && !empty($username) && !empty($password)) {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

<<<<<<< HEAD
        $sql = "INSERT INTO account (email, username, password) VALUES (?, ?, ?)";
=======
        $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
>>>>>>> 496602a618a5f9ab4793d91ce15abd3a1c403d70
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashed_password);
            
<<<<<<< HEAD
            try {
                if (mysqli_stmt_execute($stmt)) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;

                    header("location: ../HTML/homepage.php");
                    exit;
                }
            } catch (mysqli_sql_exception $e) {
                if ($e->getCode() == 1062) {
                    $error = "Fout: Deze gebruikersnaam of e-mailadres is al in gebruik.";
                } else {
                    $error = "Database fout: " . $e->getMessage();
                }
=======
            if (mysqli_stmt_execute($stmt)) {
                // Registratie gelukt! Stuur direct door naar de homepage of inlogpagina
                header("location: HTML/homepage.html"); // Of naar je inlogpagina
                exit;
            } else {
                $error = "Fout: Deze gebruikersnaam of e-mailadres bestaat al.";
>>>>>>> 496602a618a5f9ab4793d91ce15abd3a1c403d70
            }
            mysqli_stmt_close($stmt);
        }
    } else {
        $error = "Vul alle velden in.";
    }
}
<<<<<<< HEAD
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - GeenIdee</title>
    <link rel="stylesheet" href="../CSS/inloggen.css">
    <link rel="icon" href="../images/logoPlaceholder.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="header">
            <a href="../HTML/homepage.php">
                <img src="../images/logoPlaceholder.png" alt="websiteLogo">
            </a>
        </div>
    </header>

    <main>
        <div id="inlogForm">
            <form action="" method="post">
                <h1>Registreren</h1>

                <?php if (!empty($error)): ?>
                    <p style="color: red; margin-bottom: 15px; font-weight: bold; text-align: center;"><?php echo $error; ?></p>
                <?php endif; ?>

                <div>
                    <label for="email">E-mailadres</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div>
                    <label for="password">Wachtwoord</label>
                    <input type="password" id="password" name="psw" required>
                </div>

                <div>
                    <div class="register-link">
                        Al een account? <a href="login.php">Inloggen hier</a>
                    </div>
                </div>
            
                <input type="submit" value="Registreren">
            </form>
        </div>
    </main>

    <footer>
        <div class="footer">
            <p>© 2026 Team GeenIdee. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
=======
?>
>>>>>>> 496602a618a5f9ab4793d91ce15abd3a1c403d70
