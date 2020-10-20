<?php

use function PHPSTORM_META\type;

if(!empty($_POST['pseudo']) and !empty($_POST['password']))
{
    //  Récupération de l'utilisateur et de son pass hashé
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->query('SELECT id, pseudo, password, prenom, nom
                        FROM Members 
                        WHERE pseudo = \'' . $_POST['pseudo'] . '\''
                        );

    $data = $req->fetch(); // Tableau possédant à présent les clés:valeurs

    // Indique qu'on a fini de traité la requête (permet d'éviter des problèmes lors de futurs requête)
    $req->closeCursor();


    // Si on a trouver aucune personne dans la base de données (ie. pseudo incorrect)
    if (empty($data))
    {
        $erreur = 'Mauvais mot de passe ou pseudo !';
    }
    // Sinon si le mdp est correct
    // else if (password_verify($_POST['password'], $data['password']))
    else if ($_POST['password'] === $data['password']) 
    {
        $_SESSION['id'] = $data['id'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['connected'] = true;
        echo 'Vous êtes connecté !';
        
        // redirection
        header('Location: main.php');
    } 
    else
    {
        $erreur = 'Mauvais mot de passe ou pseudo !';
    }
}