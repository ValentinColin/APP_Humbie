<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = 'loginPage.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>User creation</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/create_user.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
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
				echo "<h3 style='text-align: center; color:orange'>This email address already exists!</h3>";
		}
		if (isset($_GET['sending'])) {
			if (!$_GET['sending'])
				echo "<h3 style='text-align: cente;color:red;'>Sending password initialization mail failed!</h3>";
			else
				echo "<h3 style='text-align: center; color:green;' >Successful account creation!</h3>";
		}
		?>
		<form method="post" action="../../Controller/create_user.php">
			<fieldset>
				<legend> Add a new member</legend>
				<span> Last name :* </span>
				<input id='lastname' type="text" id="nom" name="nom">
				<span>First name: * </span>
				<input type="text" id="firstname" name="prenom">
				<span> Phone Number : </span>
				<input id="phoneNumber" type="number">
				<span> Role: </span>
				<select id="access" name="role">
					<option value="User">User</option>
					<option value="Manager" selected>Manager</option>
					<option value="Admin">Director</option>
				</select>
				<br>
				<span class="manager"> Manager</span>
				<select class="manager" name="id_manager">
					<option value="null">-----</option>
					<?php for ($i = 0; $i < count($_SESSION['search']); $i++) : ?>
						<option value='<?php print_r($_SESSION['search'][$i][3])?>' > <?php print_r($_SESSION['search'][$i][1]) ?>
							<?php echo " " ?>
							<?php print_r($_SESSION['search'][$i][0]); ?> </option>
					<?php endfor; ?>
				</select>
				<br>
				<span>Email adress: * </span>
				<input id='email' type="mail" id="mail" name="mail">
				<span> Anniversary Date </span>
				<input type="date" id="birthday" name="birthday">
				<span> Delivery date of the aviation license </span>
				<input type="date" id="license_aviation" name="license_aviation">
				<input id="submit" type="submit" value="Create account">
			</fieldset>
		</form>
	</div>


	<?php require('footer.php'); ?>
</body>
<script src='../../../js/createUser.js'> </script>

</html>