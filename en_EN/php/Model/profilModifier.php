<?php 
include("login_bdd.php");
session_start();


function getprofil($id){

    $bdd = login_bdd();
    $req = $bdd->query('SELECT `id`,`prenom`, `nom`,`email`, `birthday_date`, `country`, `phone` FROM `members`
    WHERE `id` = '.$id);

    return $req->fetch();
} 

function modifierprofil($email,$birthday_date,$country,$phone){
    $bdd = login_bdd();
    $req = $bdd->prepare('UPDATE `members` 
    SET `email`=:email,
        `birthday_date`=:birthday_date,
        `country`=:country,
        `phone`=:phone
    WHERE `id` = '.$_SESSION['id']);

    $req->execute(array(
        ':email' => $email,
        ':birthday_date' => $birthday_date,
        ':country' => $country,
        ':phone' => $phone
    ));
}


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

function change_password($password, $id)
{
    $bdd = login_bdd();
	$password_gen_hash = passwordhash($password);
	$req = $bdd->prepare('UPDATE `members` SET `password`= :password WHERE id = '.$id);

	return $req->execute([
		':password' => $password_gen_hash
	]);

}

function path_photoById($id)
{		
    $bdd = login_bdd();
	$req = $bdd->query('SELECT nom, prenom,id
                        FROM members
                        WHERE id ='.$id );
    $data = $req->fetch(); // Tableau possédant à présent les clés:valeurs de la BDD
	if (file_exists('../../../../Images/Photo/' . $data['prenom'] . $data['nom'] . $data['id'] . '.png')) {
		return '../../../../Images/Photo/' . $data['prenom'] . $data['nom'] . $data['id'] . '.png';
	} else {
		return '../../../../Images/Photo/default.png';
	}
	
}




?>