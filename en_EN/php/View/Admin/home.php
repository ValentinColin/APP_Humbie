<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<!-- <link rel="stylesheet" type="text/css" href="../../../../css/global.css"> -->
	<!-- Pour fixer le footer en bas de la page -->
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php'); ?>
	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

	<main>
		<h1>Welcome to Humbie's website <?= $_SESSION['prenom'] ?> !</h1>
		<br>
		<p>
			I detect that you are logged in as administrator.
			Please be particularly careful not to communicate your login and password.<br>
		</p>
		<p>
			This site is here to help you in several areas, but has one main feature !<br>
			That of helping pilots to recover data from psychomotor tests they have carried out and those they will carry out in the future.<br>
		</p>
		<p>
			Managers are responsible for several pilots (users),<br>.
			In particular, they have the right to access the psychomotor results of the pilots for whom they are responsible.
		</p>
		<p>
			As administrator you have the following specific rights:
			<ul>
				<li>Create or ban members.</li>
				<li>Edit FAQ.</li>
				<li>Modify FAQ.</li>
				<li>Reply to tickets.</li>
				<li>... in addition to having direct access to the database and source files.</li> .
			</ul>
		</p>
		<p>
			This site is currently available in 2 languages French and English where you can switch from one to the other (see at the bottom of the page).
		</p>
		<p>
			May the force be with you !
		</p>
	</main>

	<!-- <aside id="blank"></aside> -->
	<!-- Permet de bloquer le footer en bas de l'écran -->
	<?php require('footer.php'); ?>
</body>
</html>