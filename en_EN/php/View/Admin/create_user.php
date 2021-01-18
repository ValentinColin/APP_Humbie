<?php
session_start();
include('../../Controller/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = 'loginPage.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>User creation</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/create_user.css">
</head>

<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../../../html/building.html" title="Menu"><img class="icon" src="../../../../Images/icon-burger-menu.png"></a></div>
			<h1>Member creation page</h1>
		</div>

		<div id="box-nav" class="my-block">
			<?php require('nav.php') ?>
		</div>

		<div id="box-content" class="my-block">
			<?php
			// TODO: Réduire ce bout de code en une fonction !
			if (isset($_GET['mailExisting'])) {
				if ($_GET['mailExisting'])
					echo '<p>This email is already in use !</p>';
			}
			if (isset($_GET['sending'])) {
				if (!$_GET['sending'])
					echo "<p>Failed to send password initialization mail!</p>";
				else
					echo "<p>Successful account creation !</p>";
			}
			?>

			<form method="post" action="../../Controller/create_user.php">
				<p>
					<label for="nom">Last name:</label>
					<input type="text" id="nom" name="nom" placeholder="nom" required>
				</p>
				<p>
					<label for="prenom">First name</label>
					<input type="text" id="prenom" name="prenom" placeholder="prenom" required>
					<p>
						<label for="access">Role:</label>
						<select id="access" name="role">
							<option value="User" selected>User</option>
							<option value="Manager">Manager</option>
							<option value="Admin">Administrator</option>
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
						<label for="birthday">Birthday date (YYYY-DD-MM)</label>
						<input type="date" id="birthday" name="birthday" required>
					</p>
					<p>
						<label for="license_aviation">Aviation license delivery date (YYYY-DD-MM)</label>
						<input type="date" id="license_aviation" name="license_aviation">
					</p>
					<p>
						<input type="submit" name="submit" value="Inscription">
					</p>
			</form>
		</div>
	</div>

	<?php require('footer.php'); ?>
</body>

</html>