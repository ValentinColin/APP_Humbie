<?php
/* ***************** *
 * Controller: login *
 * ***************** */

/* Permet de choisir la bonne page Home.php
 * à renvoyer à la personne (en fonction de son rôle ici)
 */

session_start();
require("../Model/login.php");

if (login($_POST["mail"], $_POST["password"])) {
	switch ($_SESSION['access']) {
		case 'USER':
			$path = "../View/User/home.php";
			break;

		case 'MANAGER':
			$path = "../View/Manager/home.php";
			break;

		case 'ADMIN':
			$path = "../View/Admin/home.php";
			break;

		default:
			$path = "../View/login.php";
			break;
	}
	header("Location: " . $path);
	exit;
} else {
	header("Location: ../View/login.php?connexion=non");
	exit;
}
