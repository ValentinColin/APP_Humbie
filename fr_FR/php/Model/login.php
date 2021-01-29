<?php
/* ************ *
 * Model: login *
 * ************ */
include_once("../Controller/function.php");
include_once("login_bdd.php");


/* Cette fonction se connecte à la BDD en vérifiant que
 * le mail et le mot de passe son correct.
 * De plus s'ils sont correct, la fonction définie
 * les variables de sessions.
 *
 * Enfin cette fonction renvoie true,
 * si le login à pu être effectué, false sinon.
 */
function login($mail, $password)
{
	$bdd = login_bdd();
	$req = $bdd->query('SELECT id, email, password, access, prenom, nom, lang, banned
                        FROM members
                        WHERE email = \'' . $mail . '\'');
	// banned vaut 1 si la personne à été banni, 0 sinon.
	$data = $req->fetch(); // Tableau possédant à présent les clés:valeurs de la BDD

	$req->closeCursor();

	if (empty($data)) { // erreur de mail
		$success = false;
	} else if (password_verify($password, $data['password'])) {
		$_SESSION['id'] 	= $data['id'];
		$_SESSION['access'] = $data['access'];
		$_SESSION['mail'] 	= $data['email'];
		$_SESSION['prenom'] = $data['prenom'];
		$_SESSION['nom'] 	= $data['nom'];
		$_SESSION['lang'] 	= $data['lang'];
		$_SESSION['banned'] = $data['banned'];
		$_SESSION['connected'] = true;

		$success = true;
	} else { // Erreur de password
		$success = false;
	}
	return $success;
}
