<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // SQL query met een placeholders (?) zoals W3Schools dat voorschrijft voor PDO prepared statements
        $sql = "SELECT id, username, password FROM account WHERE username = ?";
        try {
            $stmt = $conn->prepare($sql);
            // Voer de query uit en geef de gebruikersnaam mee als array
            $stmt->execute([$username]);
            // Haal het account op als associatieve array
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                // Controleer of het wachtwoord klopt
                if (password_verify($password, $row['password'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    // Stuur door naar de homepage
                    header("location: ../HTML/homepage.php");
                    exit;
                } else {
                    $error = "Ongeldig wachtwoord.";
                }
            } else {
                $error = "Geen account gevonden met deze gebruikersnaam.";
            }
        } catch (PDOException $e) {
            $error = "Databasefout: " . $e->getMessage();
        }
    } else {
        $error = "Vul alle velden in.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
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
            <h1>Inloggen</h1>

            <?php if (!empty($error)): ?>
                <p style="color: red; margin-bottom: 15px; font-weight: bold;"><?php echo $error; ?></p>
            <?php endif; ?>

            <div>
                <label for="username">Gebruikersnaam</label>
                <input type="text" id="username" name="username" required>
            </div>

            <div>
                <label for="password">Wachtwoord</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div>
                <div class="register-link">
                    Geen account? <a href="../include/register.php">Registreer hier</a>
                </div>
            </div>
            <input type="submit" value="Inloggen">
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