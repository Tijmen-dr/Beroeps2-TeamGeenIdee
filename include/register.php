<?php
session_start();
include 'config.php'; 

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['psw'] ?? '');

    if (!empty($email) && !empty($username) && !empty($password)) {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO account (email, username, password) VALUES (?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $email, $username, $hashed_password);
            
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
