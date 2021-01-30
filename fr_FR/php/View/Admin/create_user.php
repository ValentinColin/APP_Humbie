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

				<label for="lastname"> Nom : * </label>
				<input type="text" id='lastname' name="nom" required>

				<label for="firstname"> Prénom: * </label>
				<input type="text" id="firstname" name="prenom" required>

				<label for="phoneNumber"> Numéro de téléphone : </label>
				<input id="phoneNumber" type="number">

				<label for="access"> Rôle: </label>
				<select id="access" name="role" required>
					<option value="User">Utilisateur</option>
					<option value="Manager" selected>Manager</option>
					<option value="Admin">Administrateur</option>
				</select>
				<br>

				<label class="manager" for="label_manager"> Manager</label>
				<select class="manager" name="manager" id="label_manager">
					<option value="null">-----</option>
					<?php for ($i = 0; $i < count($_SESSION['search']); $i++) : ?>
						<option value='<?php print_r($_SESSION['search'][$i][3])?>' > <?php print_r($_SESSION['search'][$i][1]) ?>
							<?php echo " " ?>
							<?php print_r($_SESSION['search'][$i][0]); ?> </option>
					<?php endfor; ?>
				</select>
				<br>

				<label for="mail">Adresse mail: * </label>
				<input type="mail" id="mail" name="mail" required>

				<label for="birthday"> Date d'anniversaire (YYYY-MM-DD): * </label>
				<input type="date" id="birthday" name="birthday" required>

				<label for="license_aviation"> Date de livraison de la licence d'aviation </label>
				<input type="date" id="license_aviation" name="license_aviation">

				<input id="submit" type="submit" value="Créer un compte">
			</fieldset>
		</form>
	</div>

	<?php require('footer.php'); ?>
</body>
<script src='../../../js/createUser.js'> </script>

</html>