<?php

use function PHPSTORM_META\type;


//  Récupération de l'utilisateur et de son pass hashé
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->query('SELECT id, pseudo, password, prenom, nom
                    FROM Members 
                    WHERE pseudo = \'' . $_POST['pseudo'] . '\''
                    );

$data = $req->fetch(); // Tableau possédant à présent les clés:valeurs

// Indique qu'on a fini de traité la requête (permet d'éviter des problèmes lors de futurs requête)
$req->closeCursor();

// Fonction inutilisable tant que le mot de passe n'a pas été hasher
// Comparaison du pass envoyé via le formulaire avec la base
//$isPasswordCorrect = password_verify($_POST['password'], $data['password']);

// En attendant que la fonction password_verify() puisse être utiliser...
$isPasswordCorrect = false;
if ($_POST['password'] === $data['password']) 
{ 
    $isPasswordCorrect = true; 
}


// Si on ne trouve pas de personne avec ce pseudo
if (empty($data))
{
    $erreur = 'Mauvais mot de passe ou pseudo !';

}
else
{
    if ($isPasswordCorrect) 
    {
        $_SESSION['id'] = $data['id'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['connected'] = true;
        
        // redirection
        header('Location: main.php');
    }
    else 
    {
        $erreur = 'Mauvais mot de passe ou pseudo !';
    }
}
