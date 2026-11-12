<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten</title>
    <link rel="stylesheet" href="../CSS/recepten.css">
    <link rel="stylesheet" href="../CSS/homepage.css"> <!-- Nodig voor de stijlen van het gebruikersmenu -->
</head>
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
        <nav class="sidebar">
        <h1>Filters</h1>

        <h2>Type gerecht</h2>
        <input type="checkbox">Voorafjes<br>
        <input type="checkbox">Hoofdgerechten<br>
        <input type="checkbox">Nagerechten<br>
        <input type="checkbox">Drankjes<br>
        <input type="checkbox">Snacks<br>
        <input type="checkbox">Desserts<br><br>

        <h2>Moeilijkheidsgraad</h2>
        <input type="checkbox">Categorie I<br>
        <input type="checkbox">Categorie II<br>
        <input type="checkbox">Categorie III<br>
        <input type="checkbox">Categorie IV<br>
        <input type="checkbox">Categorie V<br><br>

        <h2>Voorbereidingstijd</h2>
        <input type="checkbox">15 minuten of minder<br>
        <input type="checkbox">15 tot 30 minuten<br>
        <input type="checkbox">30 tot 60 minuten<br>
        <input type="checkbox">Meer dan 60 minuten<br><br>

        <h2>Hoeveelheid ingrediënten</h2>
        <input type="checkbox">Minder dan 5 ingrediënten<br>
        <input type="checkbox">5 tot 10 ingrediënten<br>
        <input type="checkbox">10 of meer ingrediënten<br>

        <h2>Temperatuur</h2>
        <input type="checkbox">Koud<br>
        <input type="checkbox">Warm<br><br>
    </nav>


    <h1 id="receptHeader">Recepten</h1>
    <div class="recepten">
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 1</h3>
            </div>

            <h3 class="categorie">Categorie: I</h3>

            <div class="receptInfo">
                <p>Type gerecht:</p>
                <p>Voorbereidingstijd:</p>
                <p>Hoeveelheid ingrediënten:</p>
                <p>Temperatuur:</p>
            </div>
        </div>
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 2</h3>
            </div>

            <h3 class="categorie">Categorie: IV</h3>

            <div class="receptInfo">            
                <p>Type gerecht: Voorafjes</p>
                <p>Voorbereidingstijd: 10 tot 20 minuten</p>
                <p>Hoeveelheid ingrediënten: 5 tot 10 ingrediënten</p>
                <p>Temperatuur: Koud</p>
            </div>
        </div>
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 3</h3>
            </div>

            <h3 class="categorie">Categorie: II</h3>

            <div class="receptInfo">
                <p>Type gerecht: Hoofdgerechten</p>
                <p>Voorbereidingstijd: 20 tot 30 minuten</p>
                <p>Hoeveelheid ingrediënten: 10 of meer ingrediënten</p>
                <p>Temperatuur: Warm</p>
            </div>
        </div>
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 4</h3>
            </div>

            <h3 class="categorie">Categorie: III</h3>

            <div class="receptInfo">
                <p>Type gerecht: Nagerechten</p>
                <p>Voorbereidingstijd: 10 tot 20 minuten</p>
                <p>Hoeveelheid ingrediënten: 5 tot 10 ingrediënten</p>
                <p>Temperatuur: Koud</p>
            </div>
        </div>
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 5</h3>
            </div>

            <h3 class="categorie">Categorie: V</h3>

            <div class="receptInfo">
                <p>Type gerecht: Drankjes</p>
                <p>Voorbereidingstijd: 10 minuten of minder</p>
                <p>Hoeveelheid ingrediënten: Minder dan 5 ingrediënten</p>
                <p>Temperatuur: Koud</p>
            </div>
        </div>
        <div class="recept">
            <div class="imgAndTitle">
            <img src="../images/placeholder.png" alt="receptPlaceholder">
            <h3>Recept 6</h3>
            </div>

            <h3 class="categorie">Categorie: II</h3>

            <div class="receptInfo">
                <p>Type gerecht: Snacks</p>
                <p>Voorbereidingstijd: 10 tot 20 minuten</p>
                <p>Hoeveelheid ingrediënten: 5 tot 10 ingrediënten</p>
                <p>Temperatuur: Warm</p>
            </div>
        </div>

    </div>
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