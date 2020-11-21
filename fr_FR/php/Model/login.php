<?php 
/* ************ *
 * Model: login *
 * ************ */
include("../Controller/function.php");
include("login_bdd.php");


/* Cette fonction se connecte à la BDD en vérifiant que 
 * le mail et le mot de passe son correct.
 * De plus s'ils sont correct, la fonction définie
 * les variables de sessions.
 *
 * Enfin cette fonction renvoie true,
 * si le login à pu être effectué, false sinon.
 */
function login($mail, $password){
	$bdd = login_bdd('mysql:host=localhost;dbname=Humbie','root','root');
	$req = $bdd->query('SELECT id, email, password, access, prenom, nom
                        FROM Members
                        WHERE email = \'' . $mail . '\''
                        );

	$data = $req->fetch(); // Tableau possédant à présent les clés:valeurs de la BDD

	$req->closeCursor();

	if(empty($data)) { // erreur de mail
		$success = false;
	} 
	else if(password_verify($password, $data['password'])) {
		$_SESSION['id'] = $data['id'];
        $_SESSION['access'] = $data['access'];
        $_SESSION['mail'] = $data['email'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['connected'] = true;

        $success = true;
	}
	else { // Erreur de password
		$success = false;
	}
	return $success;
}










?>