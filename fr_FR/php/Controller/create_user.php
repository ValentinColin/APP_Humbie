<?php
include('./function.php');

$bdd = login_bdd('mysql:host=localhost;dbname=Humbie','root','root');

$req = $bdd->query('SELECT id, mail, banned
                    FROM Members
                    WHERE mail = \'' . $_POST['mail'] . '\''
                	);

$member = $req->fetch(); // Tableau possédant à présent les clés:valeurs

// Indique qu'on a fini de traité la requête (permet d'éviter des problèmes lors de futurs requête)
$req->closeCursor();

// Si on a trouver au moins une personne dans la base de données,
if(not empty($member))
{
	if($member['banned']){
		header('Location: ../View/create_user.php?existing=true$banned=true');
	    exit;
	} 
	else{
	    header('Location: ../View/create_user.php?existing=true$banned=false');
	    exit;
	} 
} else {
	include('../Model/create_user.php');
	header('Location: ../View/create_user.php');
}

/* 
Écrire une réponse pour informer le créateur que la création du user à été effectuer correctement ? 
Genre du texte->(Valider en vert) qui s'affiche mais si il y a une erreur alors un texte explicatif en rouge
*/

?>

