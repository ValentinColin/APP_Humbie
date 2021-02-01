<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="fr">
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
		<h1>Bienvenue sur le site de Humbie <?= $_SESSION['prenom'] ?> !</h1>
		<br>
		<p>
			Je détecte que vous êtes connecter en tant qu'administrateur.<br>
			Veuiller faire particulièrement attention à ne pas communiquer vos identifiants.
		</p>
		<p>
			Ce site est là pour vous aider dans plusieurs domaine, mais possède une fonctionnalité principale !<br>
			Celle d'aider les pilotes à récupérer les données de tests psychomoteurs qu'ils ont effectuéent et ceux qu'ils effecturons à l'avenir.<br>
		</p>
		<p>
			Les managers ont la responsabilité de plusieurs pilotes (utilisateurs),<br>
			ils ont notamment le droit d'accéder aux résultats psychomoteurs des pilotes dont ils sont responsables.
		</p>
		<p>
			En tant qu'administrateur vous avez les droits spécifiques suivant:
			<ul>
				<li>Créer ou bannir des membres.</li>
				<li>Modifier la FAQ.</li>
				<li>Répondre aux tickets.</li>
				<li>.. en plus d'avoir un accès direct à la base de données et aux fichiers sources.</li>
			</ul>
		</p>
		<p>
			Ce site est actuellement disponible en 2 langues Français et Anglais où vous pouvez passer de l'un à l'autre (voir en bas de la page).
		</p>
		<p>
			Que la force soit avec toi !
		</p>
	</main>
	<!-- <aside id="blank"></aside> -->
	<!-- Permet de bloquer le footer en bas de l'écran -->
	<?php require('footer.php'); ?>
</body>
</html>