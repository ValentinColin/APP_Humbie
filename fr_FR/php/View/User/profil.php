<?php

include("../../Controller/function.php");
include('../../Model/profilModifier.php');
$profil = getProfil();


// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = '../../View/login.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/profil.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
</head>

<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../../../html/building.html" title="Menu"><img class="icon" src="../../../../Images/icon-burger-menu.png"></a></div>
			<h1>> Profil</h1>
		</div>
		<div id="box-nav" class="my-block">
			<h2>Détails professionnel</h2>
			<img id="photo_profil_big" src=<?= path_photo() ?>>
			<table>
				<tr>
					<!-- ligne 1 -->
					<td><strong>NOM</strong></td> <!-- colonne 1 -->
					<td><?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr>
					<!-- ligne 2 -->
					<td><strong>DATE DE NAISSANCE</strong></td> <!-- colonne 1 -->
					<td><?= $profil['birthday_date'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr>
					<!-- ligne 3 -->
					<td><strong>PAYS</strong></td> <!-- colonne 1 -->
					<td><?= $profil['country'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr>
					<!-- ligne 4 -->
					<td><strong>EXPÉRIENCE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr>
					<!-- ligne 5 -->
					<td><strong>E-MAIL</strong></td> <!-- colonne 1 -->
					<td><?= $profil['email'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr>
					<!-- ligne 5 -->
					<td><strong>TESTS EFFECTUÉ</strong></td> <!-- colonne 1 -->
					<td><?= "calcul à faire.." ?></td> <!-- colonne 2 -->
				</tr>
			</table>
		</div>
		<div id="box-content" class="my-block">
			<form action="../../Controller/profilModifier.php" method="POST">
			<button class="pull-right">Modifier mon profil</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
			</form>
			<h2>A propos de moi</h2>

			<hr>
			<table>
				<tr>
					<!-- ligne 1 -->
					<th class="strong-cell"><strong>NOM</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>DATE DE NAISSANCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><?= $profil['birthday_date'] ?></td> <!-- colonne 4 -->
					
				</tr>
				<tr>
					<!-- ligne 2 -->
					<th class="strong-cell"><strong>PAYS</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?= $profil['country'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>EXPÉRIENCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr>
					<!-- ligne 3 -->
					<th class="strong-cell"><strong>TELEPHONE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?= $profil['phone'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>E-MAIL</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><?= $profil['email'] ?></td> <!-- colonne 4 -->
				</tr>
			</table>

			<br>

			<h2>Test</h2>
			<hr>
			<p>AFFICHER LES RESULTATS DES TESTS</p>
		</div>
	</div>

	<?php require('footer.php'); ?>
</body>

</html>