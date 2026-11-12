<?php
session_start();

require '../include/config.php';

// Check if the PDO connection exists
if (!isset($conn) || !($conn instanceof PDO)) {
    die("Database connection is not available.");
}

try {
    $query = "SELECT * FROM gerechten";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $results = $stmt->fetchAll();
    $rowsAmount = count($results);

} catch (PDOException $e) {
    echo "<p>FOUT!</p>";
    echo "<p>Query: " . $query . "</p>";
    echo "<p>Error: " . $e->getMessage() . "</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recepten</title>
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

    <nav class="sidebar">
        <h1>Filters</h1>

        <h2>Type gerecht</h2>
        <input onchange="updateFilter('type', 'Voorafjes')" type="checkbox">Voorafjes<br>
        <input onchange="updateFilter('type', 'Hoofdgerechten')" type="checkbox">Hoofdgerechten<br>
        <input onchange="updateFilter('type', 'Nagerechten')" type="checkbox">Nagerechten<br>
        <input onchange="updateFilter('type', 'Drankjes')" type="checkbox">Drankjes<br>
        <input onchange="updateFilter('type', 'Snacks')" type="checkbox">Snacks<br>
        <input onchange="updateFilter('type', 'Desserts')" type="checkbox">Desserts<br><br>

        <h2>Moeilijkheidsgraad</h2>
        <input onchange="updateFilter('categorie', 'Categorie I')" type="checkbox">Categorie I<br>
        <input onchange="updateFilter('categorie', 'Categorie II')" type="checkbox">Categorie II<br>
        <input onchange="updateFilter('categorie', 'Categorie III')" type="checkbox">Categorie III<br>
        <input onchange="updateFilter('categorie', 'Categorie IV')" type="checkbox">Categorie IV<br>
        <input onchange="updateFilter('categorie', 'Categorie V')" type="checkbox">Categorie V<br><br>

        <h2>Voorbereidingstijd</h2>
        <input onchange="updateFilter('tijd', '1-15 min')" type="checkbox">15 minuten of minder<br>
        <input onchange="updateFilter('tijd', '15-30 min')" type="checkbox">15 tot 30 minuten<br>
        <input onchange="updateFilter('tijd', '30-60 min')" type="checkbox">30 tot 60 minuten<br>
        <input onchange="updateFilter('tijd', '60+ min')" type="checkbox">Meer dan 60 minuten<br><br>

        <h2>Hoeveelheid ingrediënten</h2>
        <input onchange="updateFilter('ingredienten', '1-5')" type="checkbox">Minder dan 5 ingrediënten<br>
        <input onchange="updateFilter('ingredienten', '5-10')" type="checkbox">5 tot 10 ingrediënten<br>
        <input onchange="updateFilter('ingredienten', '10+')" type="checkbox">10 of meer ingrediënten<br>

        <h2>Temperatuur</h2>
        <input onchange="updateFilter('temperatuur', 'Koud')" type="checkbox">Koud<br>
        <input onchange="updateFilter('temperatuur', 'Warm')" type="checkbox">Warm<br><br>
    </nav>

    <h1 id="receptHeader">Recepten</h1>


    <div class="recepten">

        <?php
        if ($rowsAmount > 0) {
            foreach ($results as $row) { ?>

                <div class="recept"
                     data-type="<?= $row['type'] ?>"
                     data-categorie="<?= $row['moeilijkheid'] ?>"
                     data-tijd="<?= $row['bereidingstijd'] ?>"
                     data-ingredienten="<?= $row['receptIngredienten'] ?>"
                     data-temperatuur="<?= $row['temperatuur'] ?>"
                     onclick="location.href='receptendetails.php?id=<?= $row['id'] ?>'">

                    <div class="imgAndTitle">
                        <img src="../images/uploads/<?= $row['receptFoto'] ?>" alt="receptPlaceholder">
                        <h3><?= $row['receptNaam'] ?></h3>
                    </div>

                    <h3 class="categorie"><?= $row['moeilijkheid'] ?></h3>

                    <div class="receptInfo">
                        <p>Type gerecht: <?= $row['type'] ?></p>
                        <p>Voorbereidingstijd: <?= $row['bereidingstijd'] ?></p>
                        <p>Hoeveelheid ingrediënten: <?= $row['receptIngredienten'] ?></p>
                        <p>Temperatuur: <?= $row['temperatuur'] ?></p>
                    </div>

                    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
                        <form action="../include/add_favorieten.php"
                              method="POST"
                              onclick="event.stopPropagation();">

                            <input type="hidden" name="recept_id"
                                   value="<?= $row['id'] ?>">

                            <button type="submit" class="favoriet-btn">
                                ❤️ Voeg toe aan favorieten
                            </button>
                        </form>
                    <?php endif; ?>

                </div>

                <?php
            }
        } else {
            ?>
            <p>Oepsies, geen items gevonden</p>
            <?php
        }
        ?>

    </div>

</main>

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

<script src="../JAVASCRIPT/recepten.js"></script>
</body>
</html>
