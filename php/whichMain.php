<?php 
// Page qui contrôle de rôle de visiteur connecté pour le renvoyer vers la bonne page principal
switch ($_SESSION['access'] ) {
	case 'USER':
		header('Location: main.php');
		exit;

	case 'MANAGER':
		header('Location: main.php');
		exit;

	case 'ADMIN':
		header('Location: main.php');
		exit;
	
	default:
		header('Location: loginPage.php');
		exit;
}
?>