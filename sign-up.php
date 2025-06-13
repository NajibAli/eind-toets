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
try {

    if( isset($_POST['username']) AND isset($_POST['password']) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $password = password_hash($password,PASSWORD_DEFAULT);
        $query = $db -> prepare("INSERT INTO users (username,password) values ('$username', '$password')");


        if($query -> execute()){
            header("Location: login.php");
        } else {
            echo "Er is een fout opgetreden!";
        }

    }




}catch (PDOException $e){
    die("Error!:". $e ->getMessage() );
}
    

?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> Registreer</h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Gebruikersnaam</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mailadres</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Registreren</button>
            </form>

            <p class="mt-3">Al een account? <a href="login.php">Log hier in</a>.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>