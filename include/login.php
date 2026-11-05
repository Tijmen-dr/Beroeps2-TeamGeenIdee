<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT id, username, password FROM account WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
                    
                    header("location: ../HTML/homepage.php");
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <!-- Gecorrigeerd naar inloggen.css zodat je formulier-stijlen correct laden -->
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
                        Geen account? <a href="register.php">Registreer hier</a>
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