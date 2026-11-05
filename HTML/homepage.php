<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeenIdee</title>
    <link rel="stylesheet" href="../CSS/homepage.css">
    <link rel="icon" href="../images/logoPlaceholder.png" type="image/x-icon">
</head>
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

    <div class="categorieen">
        <div class="navButton" onclick="location.href='homepage.php'">Homepage</div>
        <div class="navButton" onclick="location.href='recepten.php'">Recepten</div>
        <div class="navButton noRightBorder" onclick="location.href=' uploadRecept.php'">Recept uploaden</div>
    </div>

    </header>

    <main>

        <div class="infoStukje">
            <div class="infoDeel1">
             <h1>Stop de ontkoking! Doe jij er aan mee?</h1>
             <h3>Er is een groot probleem! 
               De jongeren gaan steeds minder koken! </h3>
             <p>Dit kan natuurlijk niet, dus er moet wat gebeuren. 
               Met behulp van deze website willen we de "ontkoking" tegen gaan.<br>
               Dit moet gebruikt worden als een nieuw social media platform. 
               Maar het is niet zomaar een social media platform, hierop kun je al je favoriete recepten vinden en delen met anderen. <br>
               Maak ook je eigen recepten en zorg ervoor dat deze ook verspreid worden over heel de wereld!</p>  
            </div>
            <div class="infoDeel2">
                <h1>Nieuwsgierig?</h1>
                <p>Ben jij nieuwsgierig geworden? <br>Klik dan op de knop hieronder en bekijk de nieuwste recepten nu!</p><br>
                <button class="inlogButton" onclick="location.href='recepten.html'">Bekijk recepten</button>
            </div>
        </div>

        <h1 id="featuredHeader">Featured Recipes</h1>

    <div class="featured">
    <div class="featuredItem">
        <img src="../images/placeholder.png" alt="Placeholder">
        <div class="itemText">
            <h2>Placeholder</h2>
            <p>placeholder</p>
        </div>
    </div>

    <div class="featuredItem">
        <img src="../images/placeholder.png" alt="Placeholder">
        <div class="itemText">
            <h2>Placeholder</h2>
            <p>placeholder</p>
        </div>
    </div>

    <div class="featuredItem">
        <img src="../images/placeholder.png" alt="Placeholder">
        <div class="itemText">
            <h2>Placeholder</h2>
            <p>placeholder</p>
        </div>
    </div>

    <div class="featuredItem">
        <img src="../images/placeholder.png" alt="Placeholder">
        <div class="itemText">
            <h2>Placeholder</h2>
            <p>placeholder</p>
        </div>
    </div>
</div>

    </main>

    <footer>
        <div class="footer">
            <p>© 2026 Team GeenIdee. All rights reserved.</p>
        </div>
    </footer>

  <!-- JavaScript voor het openen/sluiten van het dropdown menu -->
    <script>
        function toggleUserMenu() {
            var dropdown = document.getElementById("userDropdown");
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }

        // Sluit het menu als je ergens anders op de pagina klikt
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