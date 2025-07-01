<?php
// Controleer of er een ID is meegegeven via GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verbind met de database
    $db = new PDO("mysql:host=localhost;dbname=hogeschool", "root", "");

    // Verwijder eerst alle leerlingen van deze docent (optioneel, zie uitleg onderaan)
    $verwijderLeerlingen = $db->prepare("DELETE FROM leerling WHERE docenten_id = :id");
    $verwijderLeerlingen->bindParam(':id', $id, PDO::PARAM_INT);
    $verwijderLeerlingen->execute();

    // Verwijder de docent zelf
    $verwijderDocent = $db->prepare("DELETE FROM docenten WHERE id = :id");
    $verwijderDocent->bindParam(':id', $id, PDO::PARAM_INT);
    $verwijderDocent->execute();

    // Terug naar de masterpagina
    header("Location: school_master.php");
    exit;
} else {
    echo "Geen docent ID opgegeven.";
}
?>