<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="../CSS/recepten.css">
<link rel="stylesheet" href="../CSS/homepage.css">
<body>

<header>
    <div class="header">
        <a href="homepage.php"> <img src="../images/logoPlaceholder.png" alt="websiteLogo"></a>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <!-- Gebruikersmenu strak rechts uitgelijnd als knoppen -->
            <div class="user-menu-container">
                <button class="inlogButton" onclick="toggleUserMenu()">
                    👤 <?php echo htmlspecialchars($_SESSION['username']); ?> ▼
                </button>
                <div id="userDropdown" class="dropdown-content">
                    <button onclick="location.href='favorieten.php'">❤️ Favoriete recepten</button>
                    <button onclick="location.href='../include/logout.php'">🚪 Uitloggen</button>
                </div>
            </div>
        <?php else: ?>
            <button class="inlogButton" onclick="location.href='../include/login.php'">Inloggen</button>
        <?php endif; ?>

    </div>
</header>

<p id="resultText"><?=$resultaat?></p>
<a id="returnButton" href="../HTML/uploadRecept.php">Terug naar de recepten pagina.</a>

</body>
</html>
