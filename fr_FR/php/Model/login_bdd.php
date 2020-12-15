<?php 
// V1(Avant) : PDO($DNS='mysql:host=localhost;dbname=Humbie', $id='root', $password='root');
// V2(Actuel): ...
// V3(Avenir?): PDO('mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);

/*
define('DB_HOST', 'freedb.tech'); //Port : 3306
define('DB_NAME', 'freedbtech_Humbie');
define('DB_USER', 'freedbtech_isep');
define('DB_PASSWORD', 'isep');
*/

function old_login_bdd($DNS='mysql:host=localhost;dbname=Humbie', $id='root', $password='root', $errmode=true){
	try
	{
		if($errmode)
			$bdd = new PDO($DNS, $id, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		else
			$bdd = new PDO($DNS, $id, $password);
		return $bdd;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}

function login_bdd(	$DB_HOST='freedb.tech', 
					$DB_NAME='freedbtech_Humbie', 
					$DB_USER='freedbtech_isep', 
					$DB_PASSWORD='isep', 
					$errmode=true)
{
	try
	{
		$DNS = 'mysql:host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8';
		if($errmode)
			$bdd = new PDO($DNS, $DB_USER, $DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		else
			$bdd = new PDO($DNS, $DB_USER, $DB_PASSWORD);
		return $bdd;
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
}

?>