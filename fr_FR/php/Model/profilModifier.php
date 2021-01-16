<?php 
include("login_bdd.php");
session_start();


function getprofil(){

    $bdd = login_bdd();
    $req = $bdd->query('SELECT `email`, `birthday_date`, `country`, `phone` FROM `members`
    WHERE `id` = '.$_SESSION['id']);

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

function change_password($password)
{
	$bdd = login_bdd();
	$req = $bdd->prepare('UPDATE members 
    					  SET password = :password ');

	$password_hash = passwordhash($password);

	$req->execute(array(
		':password' => $password_hash,
	));

	return true;
}





?>