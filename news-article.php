<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Het nieuws</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
<?php

include "modules/database.php";
global $db;

$query =$db->query("SELECT * FROM articles WHERE news");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);


?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> article 1: Title</h1>
            <p>News Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet iure nemo inventore modi cupiditate nobis ex facilis culpa ab suscipit ipsum quaerat, sapiente at minus rerum quam accusamus. Error, eligendi?</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>