<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=hogeschool", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['verzenden'])) {
        // Input sanitatie
        $naam = filter_input(INPUT_POST, 'naam', FILTER_SANITIZE_STRING);
        $klas = filter_input(INPUT_POST, 'klas', FILTER_SANITIZE_STRING);

        if ($naam && $klas) {
            $query = $db->prepare("INSERT INTO docenten (naam, klas) VALUES (:naam, :klas)");
            $query->bindParam(':naam', $naam);
            $query->bindParam(':klas', $klas);
            if ($query->execute()) {
                header("Location: school_master.php");
                exit;
            } else {
                echo "Er is een fout opgetreden bij het toevoegen van de docent.";
            }
        } else {
            echo "Vul alle velden correct in.";
        }
    }
} catch (PDOException $e) {
    die("Databasefout: " . $e->getMessage());
}
?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Docent Toevoegen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>

<h2>Nieuwe docent toevoegen</h2>

<form method="post" action="">
    <label>docent:</label>
    <input type="text" name="naam" required>
    <br>
    <label>Klas:</label>
    <input type="text" name="klas" required>
    <br>
    <input type="submit" name="verzenden" value="Toevoegen">
</form>

<a href="school_master.php">Terug naar masterpagina</a>

</body>
</html>