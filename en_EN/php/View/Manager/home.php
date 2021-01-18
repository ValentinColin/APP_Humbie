<?php
session_start();
include('../../Controller/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = '../../View/login.php');

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
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
	<link rel="script" type="text/css" href="../../../../js/drawGraph.js">
</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php') ?>

	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">
	<div>
		<div id="box-content" class="my-block">
			<main onclick="draw()">
				<!-- Corps -->
				<?= '<p>Hello ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' [' . $_SESSION['access'] . '] !</p>' .
					'<p>You are currently on the main page.</p>';
				?>
				<label>
					<h2>A graph</h2>
					<svg id="graphExemple1" width="900" height="450"></svg>
				</label>
			</main>
		</div>
	</div>
	<!-- <aside id="blank"></aside> -->
	<!-- Permet de bloquer le footer en bas de l'écran -->
	<?php require('footer.php'); ?>
</body>

<script src="../../../js/jsGraphDisplay.1.0.js"></script> <!-- Script source permettant de dessiner des graphiques -->
<script src="../../../js/drawGraph.js"></script> <!-- Script qui détermine quoi afficher comme graphique (et avec quelles données) -->

</html>