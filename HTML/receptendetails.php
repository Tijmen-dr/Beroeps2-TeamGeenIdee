<?php session_start();
require "../include/config.php";
$ID = $_GET['id'];
try {
    $query = "SELECT gerechten.*, account.username AS auteur
          FROM gerechten
          LEFT JOIN account
          ON gerechten.auteur_id = account.id
          WHERE gerechten.id = :ID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':ID', $ID);
    $stmt->execute();

    $results = $stmt->fetchAll();
    $rowsAmount = count($results);

} catch (PDOException $e) {
    echo "<p>FOUT!</p>";
    echo "<p>Query: " . $query . "</p>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    exit;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptendetails</title>
    <link rel="stylesheet" href="../CSS/receptendetails.css">
    <link rel="stylesheet" href="../CSS/recepten.css">
    <link rel="stylesheet" href="../CSS/homepage.css">
</head>
<body>

    <header>
        <div class="header">
            <a href="homepage.php">
                <img src="../images/logoPlaceholder.png" alt="websiteLogo">
            </a>

            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                <div class="user-menu-container">
                    <button class="inlogButton" onclick="toggleUserMenu()">
                        👤 <?php echo htmlspecialchars($_SESSION['username']); ?> ▼
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
        <div class="navButton" onclick="location.href='homepage.php'">Homepage</div>
        <div class="navButton" onclick="location.href='recepten.php'">Recepten</div>
        <div class="navButton noRightBorder" onclick="location.href='uploadRecept.php'">Recept uploaden</div>
    </div>
    </header>

    <?php
    if ($rowsAmount > 0) { foreach ($results as $row) { ?>
    <main class="detailMain">
    <section class="recipeDetail">
      <div class="recipeImageWrap">
        <img id="recipeImage" src="../images/uploads/<?= $row['receptFoto']?>" alt="Recept foto">
      </div>

      <div class="recipeInfo">
        <p class="recipeTag">Recept</p>
        <h1 id="recipeTitle"><?= $row['receptNaam'] ?></h1>

        <div class="recipeMeta">
          <span id="recipeTime">Tijd: <?= $row['bereidingstijd'] ?><br></span>
          <span id="recipeDifficulty"><?= $row['moeilijkheid'] ?><br></span>
          <span id="auteurID">Auteur van dit recept: <?= htmlspecialchars($row['auteur'] ?? 'Onbekend') ?></span>
        </div>

        <p id="recipeDescription"><?= $row['beschrijving']?></p>
        <button class="detailButton" onclick="location.href='recepten.php'">Terug naar recepten</button>
      </div>
    </section>

    <section class="recipeContent">
      <div class="contentCard">
        <h2>Ingrerienten:</h2>
        <p id="ingredientList"><?= $row['receptIngredientenNEW'] ?></p>
      </div>

     <div class="contentCard">
        <h2>Bereidingswijze: <br>
        <?= $row['bereidingswijze'] ?></h2>
      </div>
    </section>

        <?php } ?>
        <?php } else { ?>
                <p>Oopsies, dit is geen recept!</p>
        <?php } ?>
  </main>

    <footer>
        <div class="footer">
            <p>© 2026 Team GeenIdee. All rights reserved.</p>
        </div>
    </footer>

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