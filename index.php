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
try {
    include "modules/database.php";
    global $db;
    $query =$db->query("SELECT * FROM categories");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $date) {
//        echo "<a href='news-article.php=".$date['id']."'>";
//        echo $date['id']."".$date['name'];
//        echo "</a>";
//        echo "<br>";
    }
 } catch (PDOException $e) {
     die("Error!:".$e->getMessage());
 }
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> Nieuws Categorieën</h1>
            <ul class="list-group">
                <?php
                try {
                    foreach ($result as $category) {
                        echo '<li class="list-group-item">';
                        echo '<a href="news.php?category_id=' . $category['id'] . '" class="text-decoration-none">';
                        echo $category['name'];
                        echo '</a>';
                        echo '</li>';
                    }
                } catch (PDOException $e) {
                    echo "Error!: " . $e->getMessage();
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>


