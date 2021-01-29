<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Création d'utilisateur</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/create_user.css">
	
</head>

<body>
	<?php require('header.php'); ?>
	<div id="box-nav" class="my-block">
		<?php require('nav.php') ?>
	</div>
	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

	<div id="box-content" class="my-block">
		<?php
		// TODO: Réduire ce bout de code en une fonction !
		if (isset($_GET['mailExisting'])) {
			if ($_GET['mailExisting'])
				echo "<h3 style='text-align: center; color:orange'>Cette adresse mail existe déjà !</h3>";
		}
		if (isset($_GET['sending'])) {
			if (!$_GET['sending'])
				echo "<h3 style='text-align: cente;color:red;'>Envoie du mail d'initialisation de mot de passe échoué !</h3>";
			else
				echo "<h3 style='text-align: center; color:green;' >Création de compte réussi !</h3>";
		}
		?>
		<form method="post" action="../../Controller/create_user.php">
			<fieldset>
				<legend> Ajouter un nouveau membre</legend>
				<span> Nom :* </span>
				<input id='lastname' type="text" id="nom" name="nom">
				<span>Prénom: * </span>
				<input type="text" id="firstname" name="prenom">
				<span> Numéro de téléphone : </span>
				<input id="phoneNumber" type="number">
				<span> Rôle: </span>
				<select id="access" name="role">
					<option value="User">Utilisateur</option>
					<option value="Manager" selected>Manager</option>
					<option value="Admin">Administrateur</option>
				</select>
				<br>
				<span class="manager"> Manager</span>
				<select class="manager" name="manager">
					<option value="null">-----</option>
					<?php for ($i = 0; $i < count($_SESSION['search']); $i++) : ?>
						<option value='<?php print_r($_SESSION['search'][$i][3])?>' > <?php print_r($_SESSION['search'][$i][1]) ?>
							<?php echo " " ?>
							<?php print_r($_SESSION['search'][$i][0]); ?> </option>
					<?php endfor; ?>
				</select>
				<br>
				<span>Adresse mail: * </span>
				<input id='email' type="mail" id="mail" name="mail">
				<span> Date d'anniversaire </span>
				<input type="date" id="birthday" name="birthday">
				<span> Date de livraison de la licence d'aviation </span>
				<input type="date" id="license_aviation" name="license_aviation">
				<input id="submit" type="submit" value="Créer un compte">
			</fieldset>
		</form>
	</div>


	<?php require('footer.php'); ?>
</body>
<script src='../../../js/createUser.js'> </script>

</html>