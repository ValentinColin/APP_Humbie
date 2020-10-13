<?php
function good_password(pseudo_given,password_given) 
{
	$bdd = new PDO('mysql:host=localhost;dbname=Humbie;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

	$reponse = $bdd->Query('
		SELECT pseudo, password
		FROM Members
		WHERE password = ' . password_hash($_POST['password'], PASSWORD_DEFAULT)
		);

	if ($donnees = $reponse->fetch()) {
		# Access granted
		echo 'Access granted';
		$result = True;
	} else {
		# Access denied
		echo 'Access denied';
		$result = False;
	}

	return $result;
}

/* 
Écrire une réponse pour dire que cela c'est bien passer ? 
Genre du texte->(Valider en vert) qui s'affiche mais si il y a une erreur alors un texte explicatif en rouge
*/
?>
