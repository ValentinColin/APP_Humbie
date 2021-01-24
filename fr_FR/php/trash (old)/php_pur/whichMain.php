<?php 
// Page qui contrôle le rôle du visiteur connecté pour le renvoyer vers la bonne page principal
switch ($_SESSION['access'] ) {
	case 'USER':
		header('Location: ../page_html/home.php');
		exit;

	case 'MANAGER':
		header('Location: ../page_html/home.php');
		exit;

	case 'ADMIN':
		header('Location: ../page_html/home.php');
		exit;
	
	default:
		header('Location: ../page_html/loginPage.php');
		exit;
}
?>