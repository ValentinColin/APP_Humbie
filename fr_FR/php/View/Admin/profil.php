<?php
include('../../Controller/function.php');
include('../../Model/profilModifier.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/profil.css">
</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php'); ?>

	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">
	<div class="wrapper">
		<div id="box-nav" class="my-block">
			<img id="photo_profil_big" src=<?= path_photoById($_SESSION['resultat_profil']['id']) ?>>

		</div>
		<div id="box-content" class="my-block">
			<h1>Informations personnelles</h1>

			<table>
				<tr>
					<!-- ligne 1 -->
					<th class="strong-cell"><strong>NOM:</strong> <?= $_SESSION['resultat_profil']['prenom'] . ' ' . $_SESSION['resultat_profil']['nom'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>DATE DE NAISSANCE:</strong> <?= $_SESSION['resultat_profil']['birthday_date'] ?></td> <!-- colonne 3 -->

					
				</tr>
				<tr>
					<!-- ligne 2 -->
					<th class="strong-cell"><strong>PAYS:</strong> <?= $_SESSION['resultat_profil']['country'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>EXPÉRIENCE:</strong> UNKNOW</td> <!-- colonne 3 -->
				</tr>
				<tr>
					<!-- ligne 3 -->
					<th class="strong-cell"><strong>TELEPHONE:</strong> <?= $_SESSION['resultat_profil']['phone'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>E-MAIL:</strong> <?= $_SESSION['resultat_profil']['email'] ?></td> <!-- colonne 3 -->
				</tr>
			</table>

			<?php  if(!isset($_SESSION['resultat_profil']) ||  $_SESSION['resultat_profil']['id'] == $_SESSION['id']){?>
				<form action="../../Controller/profilModifier.php" method="POST">
					<button id="button-profil-modifier" class="pull-right">Modifier les informations personnelles</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
				</form>
				
			<?php }elseif($_SESSION['access'] == 'MANAGER'){?>
				<form action="../../Controller/results.php" method="GET">
					<button id="button-profil-modifier" class="pull-right" name="id" value="<?= $_SESSION['resultat_profil']['id']?>">Voir les resultats des tests effectués</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
				</form>

			<?php }?>
		</div>
	</div>
	<span id="footer-position">
		<?php require('footer.php'); ?>
	</span>
</body>

</html>