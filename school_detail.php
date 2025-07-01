<?php
$db = new PDO("mysql:host=localhost;dbname=hogeschool", "root", "");
$docenten_id = $_GET['docenten_id'];

$query = $db->prepare("SELECT * FROM leerling WHERE docenten_id = :docenten_id");
$query->bindParam(':docenten_id', $docenten_id, PDO::PARAM_INT);

$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $date) {
    echo "Naam: ".$date['naam']."<br>";
    echo "Cijfer: ".$date['cijfer']."<br>";
}
?>
<br>
<a href="school_master.php">Terug naar master pagina</a>