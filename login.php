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
   if(isset($_POST['inloggen'])){
       $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
       $password = $_POST['password'];
       $query = $db->prepare("SELECT * FROM users WHERE username = :username");

       $query->bindParam(':username', $username);
       $query->execute();
       if($query->rowCount() == 1){
           $result = $query->fetch(PDO::FETCH_ASSOC);
           if(password_verify($password, $result['password'])){
              echo "Ingelogd";
              header("Location: index.php");
           }else{
               echo "Wachtwoord is niet correct";
           }
       } else{
           echo "Gebruikersnaam is niet correct";
       }
       echo"<br>";
   }
}catch (PDOException $e){
    die("Error!: " . $e->getMessage());
}
?>


<div class="container">
    <div class="row">
        <div class="col-12">
            <h1> Login </h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Gebruikersnaam</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Wachtwoord</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" name="inloggen" class="btn btn-primary">Registreren</button>
            </form> 
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>