<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Humbie;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
 
$bdd->exec('
	INSERT INTO Members (email, id_manager, prenom, nom, birthday_date, aviation_licence_date) 
	VALUES ' . $_POST['prenom'] . $_POST['nom'] . $_POST['email'] . $_POST['birthday_date'] . $_POST['aviation_licence_date'] . $_POST['id_manager'] 
	);


/* 
Écrire une réponse pour informer le créateur que la création du user à été effectuer correctement ? 
Genre du texte->(Valider en vert) qui s'affiche mais si il y a une erreur alors un texte explicatif en rouge
*/

?>

