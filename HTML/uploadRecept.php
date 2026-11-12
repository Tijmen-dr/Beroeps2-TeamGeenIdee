<<<<<<< HEAD
<?php
session_start();

require '../include/config.php';

// Check if the PDO connection exists
if (!isset($conn) || !($conn instanceof PDO)) {
    die("Database connection is not available.");
}
?>

=======
<?php session_start(); ?>
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recept Uploaden - GeenIdee</title>
<<<<<<< HEAD

=======
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
    <link rel="stylesheet" href="../CSS/homepage.css">
    <link rel="stylesheet" href="../CSS/uploadRecssept.css">
    <link rel="icon" href="../images/logoPlaceholder.png" type="image/x-icon">
</head>
<<<<<<< HEAD

<body>

<header>
    <div class="header">
        <a href="homepage.php">
            <img src="../images/logoPlaceholder.png" alt="websiteLogo">
        </a>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>

            <!-- Ingelogde gebruikersmenu met dropdown -->
            <div class="user-menu-container">

                <button class="inlogButton" onclick="toggleUserMenu()">
                    👤 <?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?> ▼
                </button>

                <div id="userDropdown" class="dropdown-content">

                    <button onclick="location.href='favorieten.php'">
                        ❤️ Favoriete recepten
                    </button>

                    <button onclick="location.href='../include/logout.php'">
                        🚪 Uitloggen
                    </button>

                </div>
            </div>

        <?php else: ?>

            <button class="inlogButton" onclick="location.href='../include/login.php'">
                Inloggen
            </button>

        <?php endif; ?>
    </div>

    <div class="categorieen">

        <div class="navButton" onclick="location.href='homepage.php'">
            Homepage
        </div>

        <div class="navButton" onclick="location.href='recepten.php'">
            Recepten
        </div>

        <div class="navButton noRightBorder" onclick="location.href='uploadRecept.php'">
            Recept uploaden
        </div>

    </div>
</header>

<main>

    <form action="uploadRecept_verwerk.php" method="post" enctype="multipart/form-data">

        <label id="marginLabel" for="receptNaam">Receptnaam:</label>
        <input type="text" id="receptNaam" name="receptNaam" required><br>

        <label for="receptFoto">Foto van het recept:</label>
        <input type="file" id="receptFoto" name="receptFoto" accept="image/*" required><br>

        <label for="receptIngredientenNEW">Ingrediënten:</label>
        <textarea id="receptIngredientenNEW" name="receptIngredientenNEW" required></textarea><br>

        <label for="bereidingswijze">Hoe maak je het? (stap ENTER stap ENTER etc.):</label>
        <textarea id="bereidingswijze" name="bereidingswijze" required></textarea><br>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="">Selecteer een type</option>
            <option value="Voorafjes">Voorafjes</option>
            <option value="Hoofdgerechten">Hoofdgerechten</option>
            <option value="Nagerechten">Nagerechten</option>
            <option value="Drankjes">Drankjes</option>
            <option value="Snacks">Snacks</option>
            <option value="Desserts">Desserts</option>
        </select><br>

        <label for="moeilijkheid">Moeilijkheid:</label>
        <select id="moeilijkheid" name="moeilijkheid" required>
            <option value="">Selecteer de moeilijkheidsgraad</option>
            <option value="Categorie I">Categorie I</option>
            <option value="Categorie II">Categorie II</option>
            <option value="Categorie III">Categorie III</option>
            <option value="Categorie IV">Categorie IV</option>
            <option value="Categorie V">Categorie V</option>
        </select><br>

        <label for="bereidingstijd">Bereidingstijd</label>
        <select id="bereidingstijd" name="bereidingstijd" required>
            <option value="">Selecteer de bereidingstijd</option>
            <option value="1-15 min">15 minuten of minder</option>
            <option value="15-30 min">15 tot 30 minuten</option>
            <option value="30-60 min">30 tot 60 minuten</option>
            <option value="60+ min">Meer dan 60 minuten</option>
        </select><br>

        <label for="receptIngredienten">Hoeveelheid ingrediënten:</label>
        <select id="receptIngredienten" name="receptIngredienten" required>
            <option value="">Selecteer een hoeveelheid</option>
            <option value="1-5">Minder dan 5 ingrediënten</option>
            <option value="5-10">5 tot 10 ingrediënten</option>
            <option value="10+">10 of meer ingrediënten</option>
        </select><br>

        <label for="temperatuur">Temperatuur:</label>
        <select id="temperatuur" name="temperatuur" required>
            <option value="">Selecteer de temperatuur</option>
            <option value="Koud">Koud</option>
            <option value="Warm">Warm</option>
        </select><br>

        <label for="beschrijving">Beschrijving (korte uitleg):</label>
        <textarea id="beschrijving" name="beschrijving"></textarea><br>

        <input id="marginButton" type="submit" value="Upload Recept">

    </form>

</main>

<!-- JavaScript voor het uitklapmenu -->
<script>

    function toggleUserMenu() {
        var dropdown = document.getElementById("userDropdown");

        if (dropdown) {
            dropdown.style.display =
                (dropdown.style.display === "block") ? "none" : "block";
        }
    }

    window.onclick = function(event) {

        if (!event.target.matches('.inlogButton') &&
            !event.target.closest('.inlogButton')) {

            var dropdown = document.getElementById("userDropdown");

            if (dropdown && dropdown.style.display === "block") {
                dropdown.style.display = "none";
            }
        }
    }

</script>

</body>
</html>
=======
<body>

    <header>
        <div class="header">
            <a href="homepage.php"><img src="../images/logoPlaceholder.png" alt="websiteLogo"></a>
            
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <!-- Ingelogde gebruikersmenu met dropdown -->
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

        <div class="categorieen">
            <div class="navButton" onclick="location.href='homepage.php'">Homepage</div>
            <div class="navButton" onclick="location.href='recepten.php'">Recepten</div>
            <div class="navButton noRightBorder" onclick="location.href='uploadRecept.php'">Recept uploaden</div>
        </div>
    </header>

    <main>
        <form action="uploadRecept.php" method="post" enctype="multipart/form-data">
            <label id="marginLabel" for="receptNaam">Receptnaam:</label>
            <input type="text" id="receptNaam" name="receptNaam" required><br>

            <label for="receptFoto">Foto van het recept:</label>
            <input type="file" id="receptFoto" name="receptFoto" accept="image/*" required><br>

            <label for="receptIngrediënten">Ingrediënten:</label>
            <textarea id="receptIngrediënten" name="receptIngrediënten" required></textarea><br>

            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="">Selecteer een type</option>
                <option value="voorafjes">Voorafjes</option>
                <option value="hoofdgerechten">Hoofdgerechten</option>
                <option value="nagerechten">Nagerechten</option>
                <option value="drankjes">Drankjes</option>
                <option value="snacks">Snacks</option>
                <option value="desserts">Desserts</option>
            </select><br>

            <label for="moeilijkheidsgraad">Moeilijkheidsgraad:</label>
            <select id="moeilijkheidsgraad" name="moeilijkheidsgraad" required>
                <option value="">Selecteer de moeilijkheidsgraad</option>
                <option value="categorie1">Categorie I</option>
                <option value="categorie2">Categorie II</option>
                <option value="categorie3">Categorie III</option>
                <option value="categorie4">Categorie IV</option>
                <option value="categorie5">Categorie V</option>
            </select><br>

            <label for="bereidingstijd">Bereidingstijd</label>
            <select id="bereidingstijd" name="bereidingstijd" required>
                <option value="">Selecteer de bereidingstijd</option>
                <option value="15min">15 minuten of minder</option>
                <option value="15-30min">15 tot 30 minuten</option>
                <option value="30-60min">30 tot 60 minuten</option>
                <option value="meer60min">Meer dan 60 minuten</option>
            </select><br>

            <label for="hoeveelheidIngrediënten">Hoeveelheid ingrediënten:</label>
            <select id="hoeveelheidIngrediënten" name="hoeveelheidIngrediënten" required>
                <option value="">Selecteer een hoeveelheid</option>
                <option value="minder5">Minder dan 5 ingrediënten</option>
                <option value="5-10">5 tot 10 ingrediënten</option>
                <option value="meer10">10 of meer ingrediënten</option>
            </select><br>

            <label for="temperatuur">Temperatuur:</label>
            <select id="temperatuur" name="temperatuur" required>
                <option value="">Selecteer de temperatuur</option>
                <option value="koud">Koud</option>
                <option value="warm">Warm</option>
            </select><br>

            <label for="receptBeschrijving">Beschrijving:</label>
            <textarea id="receptBeschrijving" name="receptBeschrijving"></textarea><br>

            <input id="marginButton" type="submit" value="Upload Recept">
        </form>
    </main>

    <!-- JavaScript voor het uitklapmenu -->
    <script>
        function toggleUserMenu() {
            var dropdown = document.getElementById("userDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        window.onclick = function(event) {
            if (!event.target.matches('.inlogButton') && !event.target.closest('.inlogButton')) {
                var dropdown = document.getElementById("userDropdown");
                if (dropdown && dropdown.style.display === "block") {
                    dropdown.style.display = "none";
                }
            }
        }
    </script>
</body>
</html>
>>>>>>> d56bdf353a8c0787431a2a7711ad17db7ba72473
