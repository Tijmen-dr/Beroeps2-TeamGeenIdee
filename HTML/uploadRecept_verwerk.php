<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: ../include/login.php");
    exit();
}
require "../include/config.php";
$user_id = $_SESSION['id'];


$resultaat = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ontvang de formuliergegevens
    $receptNaam = trim($_POST["receptNaam"] ?? "");
    $receptIngredientenNEW = trim($_POST["receptIngredientenNEW"] ?? "");
    $type = $_POST['type'] ?? "";
    $bereidingstijd = $_POST['bereidingstijd'] ?? "";
    $receptIngredienten = trim($_POST['receptIngredienten'] ?? "");
    $temperatuur = $_POST['temperatuur'] ?? "";
    $moeilijkheid = $_POST['moeilijkheid'] ?? "";
    $beschrijving = trim($_POST['beschrijving'] ?? "");


    $bereidingswijze = trim($_POST["bereidingswijze"] ?? "");
    $stappen = preg_split('/\r\n|\r|\n/', $bereidingswijze);
    $bereidingswijzeHTML = '<ol class="bereidingswijze">';

    foreach ($stappen as $stap) {
        $stap = trim($stap);

        if ($stap !== "") {
            $bereidingswijzeHTML .= '<li>' . htmlspecialchars($stap, ENT_QUOTES, 'UTF-8') . '</li>';
        }
    }

    $bereidingswijzeHTML .= '</ol>';
    $bereidingswijze = $bereidingswijzeHTML;

    // Controleer verplichte velden
    if (
        $receptNaam === "" ||
        $receptIngredienten === "" ||
        $bereidingswijze === "" ||
        $type === "" ||
        $bereidingstijd === "" ||
        $receptIngredienten === "" ||
        $temperatuur === "" ||
        $moeilijkheid === ""
    ) {
        die("Vul alle verplichte velden in.");
    }


// Foto handling

    $uploadMap = realpath(__DIR__ . "/../images/uploads");

    if ($uploadMap === false) {
        die("Uploadmap bestaat niet.");
    }

    $uploadMap .= DIRECTORY_SEPARATOR;

    $bestandsnaam = null;

    $toegestaneTypes = [
        'image/jpeg' => '.jpg',
        'image/png' => '.png',
        'image/webp' => '.webp'
    ];

    if (
        !isset($_FILES['receptFoto']) ||
        $_FILES['receptFoto']['error'] !== UPLOAD_ERR_OK
    ) {
        die("Upload error code: " . ($_FILES['receptFoto']['error'] ?? 'Geen bestand ontvangen'));
    }

    if ($_FILES['receptFoto']['size'] > 5 * 1024 * 1024) {
        die("De afbeelding mag maximaal 5 MB groot zijn.");
    }

    $mimeType = mime_content_type($_FILES['receptFoto']['tmp_name']);

    if (!array_key_exists($mimeType, $toegestaneTypes)) {
        die("Ongeldig bestandstype: " . $mimeType);
    }

    $bestandsnaam = bin2hex(random_bytes(16)) . $toegestaneTypes[$mimeType];

    $uploadPad = $uploadMap . $bestandsnaam;

    $moveResult = move_uploaded_file(
    $_FILES['receptFoto']['tmp_name'],
    $uploadPad
);

if (!$moveResult) {
    die("Afbeelding verplaatsen mislukt.");
}
    }

    try {

        $query = "INSERT INTO gerechten
    (receptNaam, receptFoto, receptIngredientenNEW, bereidingswijze, type, bereidingstijd, receptIngredienten, temperatuur, moeilijkheid, beschrijving, auteur_id)
    VALUES
    (:receptNaam, :receptFoto, :receptIngredientenNEW, :bereidingswijze, :type, :bereidingstijd, :receptIngredienten, :temperatuur, :moeilijkheid, :beschrijving, :auteur_id)";

        $stmt = $conn->prepare($query);

        $stmt->execute([
            'receptNaam' => $receptNaam,
            'receptFoto' => $bestandsnaam,
            'receptIngredientenNEW' => $receptIngredientenNEW,
            'bereidingswijze' => $bereidingswijze,
            'type' => $type,
            'bereidingstijd' => $bereidingstijd,
            'receptIngredienten' => $receptIngredienten,
            'temperatuur' => $temperatuur,
            'moeilijkheid' => $moeilijkheid,
            'beschrijving' => $beschrijving,
            'auteur_id' => $user_id
        ]);

        $resultaat = "{$receptNaam} is succesvol toegevoegd aan de lijst!";

    } catch (PDOException $e) {

    if (file_exists($uploadPad)) {
        unlink($uploadPad);
    }

    error_log("PDO fout bij het uploaden van een recept: " . $e->getMessage());

    $resultaat = "Er is een fout opgetreden bij het toevoegen van het recept.";
}

include '../views/uploadRecept_verwerk_view.php';

?>

