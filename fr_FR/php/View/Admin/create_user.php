<?php
session_start();
include('../../Controller/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Création d'utilisateur</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
</head>
<body>
	<?php require('header.php'); ?>

	<?php 
		// TODO: Réduire ce bout de code en une fonction !
		if(isset($_GET['mailExisting'])){ 
			if($_GET['mailExisting'])
				echo '<p>Cette adresse mail existe déjà !</p>';
		}
		if (isset($_GET['sending'])) {
			if (!$_GET['sending'])
				echo "<p>Envoie du mail d'initialisation de mot de passe échoué !</p>";
			else
				echo "<p>Création de compte réussi !</p>";
		}
	?>

	<form method="post" action="../../Controller/create_user.php">
		<p>
			<label for="nom">Nom:</label>
			<input type="text" id="nom" name="nom" placeholder="nom" required>
		</p>
		<p>
			<label for="prenom">Prénom:</label>
			<input type="text" id="prenom" name="prenom" placeholder="prenom" required>
		<p>
		<label for="access">Rôle:</label>
			<select id="access" name="role">
				<option value="User" selected>Utilisateur</option>
				<option value="Manager">Manager</option>
				<option value="Admin">Administrateur</option>
			</select>
		</p>
		<p>
			<label for="id_manager">Manager:</label>
			<input type="text" id="id_manager" name="id_manager">
		</p>
		<p>
			<label for="mail">Email:</label>
			<input type="mail" id="mail" name="mail" placeholder="exemple@mail.com" required>
		</p>
		<p>
			<label for="birthday">Date d'anniversaire (YYYY-DD-MM)</label>
			<input type="date" id="birthday" name="birthday" required>
		</p>
		<p>
			<label for="license_aviation">Date de livraison de la licence d'aviation (YYYY-DD-MM)</label>
			<input type="date" id="license_aviation" name="license_aviation">
		</p>
		<p>
			<input type="submit" name="submit" value="Inscription">
		</p>
	</form>

	<?php require('footer.php'); ?>
</body>
</html>

