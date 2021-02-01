<?php
session_start();
include('../../Controller/function.php');
verif_access('USER');
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
 			I detect that you are logged in as a user (or Pilots).<br>
 			Please be particularly careful not to communicate your login and password.<br>
 			Your psychomotor test results are accessible from this site by you and your manager only.
 		</p>
 		<p>
 			This site is here to help you in several areas, but has one main feature !<br>
 			That of helping pilots to recover data from psychomotor tests they have carried out and those they will carry out in the future.<br>
 		</p>
 		<p>
 			In case of problem do not hesitate to consult the FAQ, to contact an administrator or to send an email to our service (see at the bottom of the page).
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