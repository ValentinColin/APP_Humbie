<?php
session_start();
include('./function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Création d'utilisateur</title>
	<link rel="stylesheet" type="text/css" href="../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../css/footer.css">
</head>
<body>
	<?php require('header.php'); ?>

	<form action="" method="post">
		<input type="text" name="nom" placeholder="nom" required>
		<input type="text" name="prenom" placeholder="prenom" required>
		<select name="role">
			<option value="User" selected>Utilisateur</option>
			<option value="Manager">Manager</option>
			<option value="Admin">Administrateur</option>
		</select>
		<input type="text" name="id_manager">
		<input type="mail" name="mail" placeholder="exemple@mail.com" required>
		<input type="date" name="birthday" required>
		<input type="date" name="license_aviation" required>

		<?php 
			// TODO: Réduire ce bout de code en une fonction !
			if(isset($_GET['existing'])){ 
				if($_GET['existing'] == 'true'){ 
					echo 'Cette adresse mail existe déjà !';
				}
			}
		?>
	</form>

	<?php require('footer.php'); ?>
</body>
</html>

