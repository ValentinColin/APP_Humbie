<?php
include("../../Controller/function.php");
include('../../Model/profilModifier.php');
if_not_connected($redirection = "../../View/login.php");


$profil = getprofil();

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

			</table>
		</div>
		<div id="box-content" class="my-block">
        <form method="post" action="../../Controller/profilModifier.php">
			<button class="pull-right">Valider les modifications</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
			<h2>A propos de moi</h2>

			<hr>
			<table>
				<tr>
					<!-- ligne 1 -->
					<th class="strong-cell"><strong>NOM</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>DATE DE NAISSANCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><input type="text" name="birthday_date" value="<?= $profil['birthday_date'] ?>"> </td> <!-- colonne 4 -->
				</tr>
				<tr>
					<!-- ligne 2 -->
					<th class="strong-cell"><strong>PAYS</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><input type="text" name="country" value="<?= $profil['country'] ?>"> </td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>EXPÉRIENCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr>
					<!-- ligne 3 -->
					<th class="strong-cell"><strong>TELEPHONE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><input type="text" name="phone"  value="<?= $profil['phone'] ?>"> </td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>E-MAIL</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><input type="text" name="email" value="<?= $profil['email'] ?>"></td> <!-- colonne 4 -->
				</tr>
			</table>

			<br>
        </form>
		</div>
	</div>

	<?php require('footer.php'); ?>
</body>

</html>