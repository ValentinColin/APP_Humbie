<?php 
// Page qui contrôle de rôle de visiteur connecté pour le renvoyer vers la bonne page principal
switch ($_SESSION['access'] ) {
	case 'USER':
		header('Location: home.php');
		exit;

	case 'MANAGER':
		header('Location: home.php');
		exit;

	case 'ADMIN':
		header('Location: home.php');
		exit;
	
	default:
		header('Location: loginPage.php');
		exit;
}
?>