<?php 

function login_bdd($DNS='mysql:host=localhost;dbname=Humbie', $id='root', $password='root', $errmode=true){
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

?>