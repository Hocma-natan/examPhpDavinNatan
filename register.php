<?php
    require_once 'include.php'
?>

<h2>ajouter un admin</h2>


<form method="POST" action="register.php">
    <input type="email" name="email"  placeholder="Email">
    <input type="text" name="login" placeholder="Login">
    <input type="password" name="password" placeholder="Mot de passe">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="submit">
</form>

<!-- required -->

<ul>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
$errors = [];
$errors = validateFormUser();

    if(count($errors)>0){
        echo('<h2>Il y a des erreurs : </h2>');
        foreach($errors as $error){
            echo('<li>'.$error.'</li>');
        }
    }
    if(count($errors) == 0){
        $errors = registerUser($pdo, $errors);
    }
}
?>
</ul>

