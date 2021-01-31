<?php
// VALEUR À MODIFIER POUR PASSER EN BASE DE DONNÉES LOCAL 
// true 	= 	local
// false 	= 	en ligne
define('DB_LOCAL', false);

// VALEUR PERMETTANT DE MODIFIER D'ACCÉDER À LA BONNE BASE DE DONNÉES EN LIGNE
define('DB_HOST', 'freedb.tech'); //Port : 3306
define('DB_NAME', 'freedbtech_Humbie');

// IDENTIFIANTS PERMETANT DE SE CONNECTER À LA BASE DE DONNÉES 
define('DB_USER', 'freedbtech_isep');
define('DB_PASSWORD', 'isep');


// Cette fonction permet de se connecter à la base de données 
// afin de pouvoir faire des requêtes SQL.
// param:	$errmode -> permet d'activer l'affichage des erreurs SQL
function login_bdd($errmode = true)
{
	try {
		if (DB_LOCAL) {
			$DNS = 'mysql:host=localhost;dbname=Humbie;charset=utf8';
			$id = 'root';
			$password = 'root';
		} else {
			$DNS = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
			$id = DB_USER;
			$password = DB_PASSWORD;
		}

		if ($errmode) {
			$bdd = new PDO($DNS, $id, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} else {
			$bdd = new PDO($DNS, $id, $password);
		}

		return $bdd;
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
}
