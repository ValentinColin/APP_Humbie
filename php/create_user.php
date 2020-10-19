<?php
session_start();
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Humbie;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

/* L'id du manager est transmis dans la bdd du user 
   afin de savoir qui est son suppérieur hiérarchique direct 
   ainsi que celui qui a crée son compte */
$id_manager = $_SESSION['id'];

$bdd->exec('
	INSERT INTO Members (id_manager, prenom, nom, email, birthday_date, aviation_licence_date) 
	VALUES '.$id_manager.$_POST['prenom'].$_POST['nom'].$_POST['email'].$_POST['birthday_date'].$_POST['aviation_licence_date']
	);


/* 
Écrire une réponse pour informer le créateur que la création du user à été effectuer correctement ? 
Genre du texte->(Valider en vert) qui s'affiche mais si il y a une erreur alors un texte explicatif en rouge
*/

?>

