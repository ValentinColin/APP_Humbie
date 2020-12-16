<?php
include('../Controller/function.php');
include('../Model/login_bdd.php');

function mail_exist($mail){
	$bdd = login_bdd();
	$req = $bdd->query('SELECT email
                        FROM members
                        WHERE email = \'' . htmlspecialchars($mail) . '\'');
	$data = $req->fetch(); // Tableau possédant à présent les clés:valeurs de la BDD
	$req->closeCursor();

	$exist = (count($data) > 0) ? true : false;
	return $exist;
}

function create_user($data){
	$bdd = login_bdd();
	$req = $bdd->prepare('INSERT INTO members (mail,password,access,nom,prenom,birthday_date,aviation_licence_date)
    					  VALUES (:mail ,:password ,:access ,:nom ,:prenom ,:birthday_date ,:aviation_licence_date)');

	$password_gen = passwordgen();
    $password_gen_hash = passwordhash($password_gen);

    $req->execute(array(':mail' => htmlspecialchars($data['mail']),
					    ':password' => $password_gen_hash,
					    ':access' => htmlspecialchars($data['role']),
					    ':nom' => htmlspecialchars($data['nom']),
					    ':prenom' => htmlspecialchars($data['prenom']),
					    ':birthday_date' => htmlspecialchars($data['birthday']),
					    ':aviation_licence_date' => htmlspecialchars($data['license_aviation'])
						));
    if ($data['role'] == 'USER') {
    	$req = $bdd->prepare('	UPDATE `members` 
    							SET `id_manager` = :id_man
    							WHERE `members`.`mail` = :mail');
    	$req->execute(array(':mail' => $data['mail'],
    						':id_man' => htmlspecialchars($data['id_manager'])));
    }
    return $passwordgen;
}