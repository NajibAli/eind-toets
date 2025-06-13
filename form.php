<?php
 if(isset($_POST['verzenden'])){
//     $naam = $_POST['naam'];
//     filter/ sanitize voor de toets
     $naam = filter_input(INPUT_POST,"naam",FILTER_SANITIZE_SPECIAL_CHARS);
     $leeftijd = filter_input(INPUT_POST,"leeftijd",FILTER_SANITIZE_SPECIAL_CHARS);
     $bericht = filter_input(INPUT_POST,"bericht",FILTER_SANITIZE_SPECIAL_CHARS);

     echo "<h1>ingevulde gegevens</h1>";
     echo "Naam:".$_POST['naam']."<br>";
     echo "Leeftijd:".$_POST['leeftijd']."<br>";
     echo "Bericht:".$_POST['bericht']."<br>";
     echo "<br><br><br>";
 } else{
     $naam = "";
     $leeftijd = "";
     $bericht = "";
 }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<p> Naam: <?= $naam?></p>
<p> Leeftijd: <?= $leeftijd?></p>
<p> Bericht: <?= $bericht?></p>

<h1>Formulier</h1>
 <form method="post" action="">
     <label>Naam:</label>
     <br>
     <input type="text" name="naam">
     <br>
     <label>leeftijd:</label>
     <br>
     <input type="number" name="leeftijd">
    <br>
     <laber>Bericht:</laber>
     <br>
     <textarea name="bericht"></textarea>

     <br>
     <input class="mt-3" type="submit"  name="verzenden" value="Submit">

 </form>
</body>
</html>