<?php

use function PHPSTORM_META\type;

if(!empty($_POST['mail']) and !empty($_POST['password']))
{
    //  Récupération de l'utilisateur et de son pass hashé
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->query('SELECT id, access, password, email, prenom, nom
                        FROM Members
                        WHERE email = \'' . $_POST['mail'] . '\''
                        );

    $data = $req->fetch(); // Tableau possédant à présent les clés:valeurs

    // Indique qu'on a fini de traité la requête (permet d'éviter des problèmes lors de futurs requête)
    $req->closeCursor();


    // Si on a trouver aucune personne dans la base de données (ie. pseudo incorrect)
    if (empty($data))
    {
        $erreur = 'Adresse mail ou mot de passe incorrecte.';
        header('Location: loginPage.php?connexion=non');
    }
    // Sinon si le mdp est correct

    else if (password_verify($_POST['password'], $data['password']))
    {
        $_SESSION['id'] = $data['id'];
        $_SESSION['access'] = $data['access'];
        $_SESSION['mail'] = $data['email'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['connected'] = true;
        echo 'Vous êtes connecté !';

        // redirection
        header('Location: home.php');
        exit;
    }
    else
    {
        $erreur = 'Adresse mail ou mot de passe incorrecte.';
        header('Location: loginPage.php?connexion=non');
    }
}