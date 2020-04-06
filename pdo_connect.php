
<?php
try {
    $host ='localhost:3306';
    $dbName = 'dauphine';
    $user = 'root';
    $password = '';
    $pdo = new PDO('mysql:host='.$host.';dbname='.$dbName.';charset=utf8',$user,$password);
}
catch(PDOException $e){
    throw new InvalidArgumentException('Erreur connexion à la base de données : '.$e->getMessage());
    exit;
}
// echo('cool je suis connecté =)');
?>