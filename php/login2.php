<?php

use function PHPSTORM_META\type;

if(!empty($_POST['pseudo']) && !empty($_POST['password'])){

//  Récupération de l'utilisateur et de son pass hashé
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT  id, password FROM members WHERE pseudo = :pseudo');
$req->execute(array(
    'pseudo' => $_POST['pseudo']));


$resultat = $req->fetch(); // Tableau possédant à présent les clés id et password

// Comparaison du pass envoyé via le formulaire avec la base
//$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
$isPasswordCorrect = false;
if ($_POST['password'] === $resultat['password']){
    $isPasswordCorrect = true;
}



if (empty($resultat))
{
    $erreur = 'Mauvais mot de passe ou pseudo !';

}
else
{
    if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['connected'] = true;
        echo 'Vous êtes connecté !';
        header('Location: main.php');
    }
    else {
        $erreur = 'Mauvais mot de passe ou pseudo !';
    }
}
}