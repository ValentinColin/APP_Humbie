<?php
require_once('../Controller/function.php');
require_once('../Model/login_bdd.php');

function mail_exist($mail)
{
	$bdd = login_bdd();
	$req = $bdd->query('SELECT email
                        FROM members
                        WHERE email = \'' . htmlspecialchars($mail) . '\'');
	$data = $req->fetchAll(); // Tableau possédant à présent les clés:valeurs de la BDD
	$req->closeCursor();

	$exist = (count($data) > 0) ? true : false;
	return $exist;
}

function create_user($data)
{
	$bdd = login_bdd();
	$req = $bdd->prepare('INSERT INTO members (email,password,access,id_manager,nom,prenom,birthday_date,aviation_licence_date)
    					  VALUES (:mail ,:password ,:access ,:id_manager, :nom ,:prenom ,:birthday_date ,:aviation_licence_date)');

	$password_gen = passwordgen();
	$password_gen_hash = passwordhash($password_gen);

	if (empty($data['id_manager'])) 		$data['id_manager'] = null;
	if (empty($data['license_aviation'])) 	$data['license_aviation'] = null;

	$req->execute(array(
		':mail' => htmlspecialchars($data['mail']),
		':password' => $password_gen_hash,
		':access' => htmlspecialchars($data['role']),
		':id_manager' => $data['id_manager'],
		':nom' => htmlspecialchars($data['nom']),
		':prenom' => htmlspecialchars($data['prenom']),
		':birthday_date' => $data['birthday'],
		':aviation_licence_date' => $data['license_aviation']
	));

	return $password_gen;
}

function changePassword($password,$email)
{
	$bdd = login_bdd();
	$password_gen_hash = passwordhash($password);
	$req = $bdd->prepare('UPDATE `members` SET `password`= :password WHERE email = \'' . htmlspecialchars($email) . '\'');

	return $req->execute([
		':password' => $password_gen_hash
	]);

}
