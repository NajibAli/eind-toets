<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bike Store</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }
        td {
            border: 1px solid black;
            width: 100px;
            gap: 5px;
        }
    </style>
</head>
<body>
<?php
$sd = new PDO("mysql:host=localhost;dbname=hogeschool", "root", "");
$query = $sd->prepare("SELECT * FROM docenten");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

$countQuery = $sd->prepare("SELECT COUNT(*) AS totaal FROM docenten");
$countQuery->execute();
$countResult = $countQuery->fetch(PDO::FETCH_ASSOC);
$totaalDocenten = $countResult['totaal'];
?>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>naam</th>
        <th>klas</th>
        <th>delete</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $date): ?>
        <tr>
            <td><?= $date['id'] ?></td>
            <td><?= $date['naam'] ?></td>
            <td><a href="school_detail.php?docenten_id=<?= $date['id'] ?>"><?= $date['klas'] ?></a></td>
            <td><a href="school_delete.php?id=<?= $date['id']?>" onclick="return confirm('Weet je zeker dat je deze docent wilt verwijderen?');" style="color:#dc3545;">Delete</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


<div class="count">
    Totaal aantal docenten: <?= $totaalDocenten ?>
</div>

<br>

<a href="school_toevoegen.php" >Voeg docent toe</a>

</body>
</html>