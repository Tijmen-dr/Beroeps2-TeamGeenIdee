<?php


session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

require "../include/config.php";

$user_id = $_SESSION['id'];

$sql = "SELECT gerechten.*
        FROM favorieten
        INNER JOIN gerechten
        ON favorieten.recept_id = gerechten.id
        WHERE favorieten.user_id = ?";

$stmt = $conn->prepare($sql);
$stmt->execute([$user_id]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$rowsAmount = count($results);

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_favorite'])) {

    if (
            !isset($_POST['csrf_token']) ||
            !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])
    ) {
        die("Ongeldige aanvraag.");
    }

    $recept_id = filter_input(INPUT_POST, 'recept_id', FILTER_VALIDATE_INT);

    if ($recept_id !== false && $recept_id !== null && $recept_id > 0) {

        $sql = "DELETE FROM favorieten
                WHERE user_id = ?
                AND recept_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$user_id, $recept_id]);
    }

    header("Location: favorieten.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn favorieten</title>
    <link rel="stylesheet" href="../CSS/recepten.css">
    <link rel="stylesheet" href="../CSS/homepage.css"
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

<h1>Mijn favoriete recepten ❤️</h1>

<div class="recepten">

    <?php if ($rowsAmount > 0): ?>

        <?php foreach ($results as $row): ?>

            <div class="recept">

                <div class="imgAndTitle"
                     onclick="location.href='receptendetails.php?id=<?= $row['id'] ?>'">

                    <img src="../images/uploads/<?= $row['receptFoto'] ?>"
                         alt="Recept">

                    <h3><?= $row['receptNaam'] ?></h3>

                </div>

                <h3 class="categorie">
                    <?= $row['moeilijkheid'] ?>
                </h3>

                <div class="receptInfo">
                    <p>Type gerecht: <?= $row['type'] ?></p>

                    <p>Voorbereidingstijd:
                        <?= $row['bereidingstijd'] ?>
                    </p>

                    <p>Hoeveelheid ingrediënten:
                        <?= $row['receptIngredienten'] ?>
                    </p>

                    <p>Temperatuur:
                        <?= $row['temperatuur'] ?>
                    </p>
                </div>

                <form method="POST" action="favorieten.php">

                    <input type="hidden" name="recept_id"
                           value="<?= htmlspecialchars($row['id']) ?>">

                    <input type="hidden" name="csrf_token"
                           value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

                    <button type="submit"
                            name="remove_favorite"
                            class="removeFavoriteButton">

                        ❤️ Verwijderen uit favorieten

                    </button>

                </form>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p>Je hebt nog geen favoriete recepten opgeslagen! ❤️</p>

    <?php endif; ?>

</div>

<script>
    function toggleUserMenu() {
        var dropdown = document.getElementById("userDropdown");
        if (dropdown) {
            dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
        }
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