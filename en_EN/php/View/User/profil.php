<?php
include("../../Controller/function.php");
include('../../Model/profilModifier.php');
verif_access('USER');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/profil.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
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
			<h1>Personnal informations</h1>

			<table>
				<tr>
					<!-- ligne 1 -->
					<th class="strong-cell"><strong>LAST NAME:</strong> <?= $_SESSION['resultat_profil']['prenom'] . ' ' . $_SESSION['resultat_profil']['nom'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>BIRTH DATE:</strong> <?= $_SESSION['resultat_profil']['birthday_date'] ?></td> <!-- colonne 3 -->

					
				</tr>
				<tr>
					<!-- ligne 2 -->
					<th class="strong-cell"><strong>COUNTRY:</strong> <?= $_SESSION['resultat_profil']['country'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>EXPERIENCE:</strong> UNKNOW</td> <!-- colonne 3 -->
				</tr>
				<tr>
					<!-- ligne 3 -->
					<th class="strong-cell"><strong>PHONE:</strong> <?= $_SESSION['resultat_profil']['phone'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>E-MAIL:</strong> <?= $_SESSION['resultat_profil']['email'] ?></td> <!-- colonne 3 -->
				</tr>
			</table>

			<?php  if(!isset($_SESSION['resultat_profil']) ||  $_SESSION['resultat_profil']['id'] == $_SESSION['id']){?>
				<form action="../../Controller/profilModifier.php" method="POST">
					<button id="button-profil-modifier" class="pull-right">Modify personnal informations</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
				</form>
				
			<?php }elseif($_SESSION['access'] == 'MANAGER'){?>
				<form action="../../Controller/results.php" method="GET">
					<button id="button-profil-modifier" class="pull-right" name="id" value="<?= $_SESSION['resultat_profil']['id']?>">See the results of the tests carried out</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
				</form>

			<?php }?>
		</div>
	</div>
	<span id="footer-position">
		<?php require('footer.php'); ?>
	</span>
</body>

</html>