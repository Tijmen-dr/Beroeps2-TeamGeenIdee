<?php
session_start();
include 'config.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
<<<<<<< HEAD
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
=======
        $sql = "SELECT id, username, password FROM account WHERE username = ?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if ($row = mysqli_fetch_assoc($result)) {
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
                if (password_verify($password, $row['password'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];
<<<<<<< HEAD
                    // Stuur door naar de homepage
=======
                    
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
                    header("location: ../HTML/homepage.php");
                    exit;
                } else {
                    $error = "Ongeldig wachtwoord.";
                }
            } else {
                $error = "Geen account gevonden met deze gebruikersnaam.";
            }
<<<<<<< HEAD
        } catch (PDOException $e) {
            $error = "Databasefout: " . $e->getMessage();
=======
            mysqli_stmt_close($stmt);
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
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
<<<<<<< HEAD
=======
    <!-- Gecorrigeerd naar inloggen.css zodat je formulier-stijlen correct laden -->
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
    <link rel="stylesheet" href="../CSS/inloggen.css">
    <link rel="icon" href="../images/logoPlaceholder.png" type="image/x-icon">
</head>
<body>
<<<<<<< HEAD
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
=======
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
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
