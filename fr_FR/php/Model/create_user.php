<?php
/* ******************************************** *
 * Fichier inclue dans ../Model/create_user.php *
 * ******************************************** */

$bdd->exec('INSERT INTO Members (id_manager, prenom, nom, email, birthday_date, aviation_licence_date) 
			VALUES '. $_POST['id_manager']
					. $_POST['prenom']
					. $_POST['nom']
					. $_POST['email']
					. $_POST['birthday_date']
					. $_POST['aviation_licence_date']);


/* 
Écrire une réponse pour informer le créateur que la création du user à été effectuer correctement ? 
Genre du texte->(Valider en vert) qui s'affiche mais si il y a une erreur alors un texte explicatif en rouge
*/

?>