<?php
function validateFormUser(){
    $errors = [];
    if(empty($_POST['email'])){
        $errors[] = "vous avez oublier l\'Email";
    }
    if(empty($_POST['login'])){
        $errors[] = "vous avez oublier le pseudo";
    }
    if(empty($_POST['password'])){
        $errors[] = "vous avez oublier le mot de passe";
    }
    if(empty($_POST['nom'])){
        $errors[] = "vous avez oublier le nom";
    }
    if(empty($_POST['prenom'])){
        $errors[] = "vous avez oublier le prenom";
    }
    return $errors;
}


function registerUser($pdo, $errors){
    try{
        $req = $pdo->prepare('INSERT INTO utilisateur(email, login, password , nom, prenom)
        VALUES(:email, :login, :password, :nom, :prenom)');
        $req->execute([
        'email' => $_POST['email'],
        'login' => $_POST['login'],
        'password' => md5($_POST['password']),
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom']
        ]);
    }
    catch (PDOException $exeption){
        var_dump($exeption);
    }
    return $errors;
}
?>
<!--                                          HEADER                                                                   -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" 
    crossorigin="anonymous">
    <title>Dauphine</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Ajouter un article</a>
      </li>
    </ul>
      <a href="adminLogin.php">Admin</a>
  </div>
</nav>
