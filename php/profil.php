<?php 
session_start();
include('function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="default.css"> -->
	<link rel="stylesheet" type="text/css" href="../css/profil.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>
<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../html/building.html" title="Menu"><img class="icon" src="../Images/icon-burger-menu.png"></a></div>
			<h1> > Profil</h1>
		</div>
		<div id="box-nav" class="my-block">
			<h2>Détails professionnel</h2>
			<img id="photo_profil_big" src=<?php echo path_photo() ?>>
			<table>
				<tr> <!-- ligne 1 -->
					<td><strong>NOM</strong></td> <!-- colonne 1 -->
					<td><?php echo $_SESSION['prenom'] .' '. $_SESSION['nom'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 2 -->
					<td><strong>AGE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 3 -->
					<td><strong>RÉSIDENCE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 4 -->
					<td><strong>EXPÉRIENCE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 5 -->
					<td><strong>E-MAIL</strong></td> <!-- colonne 1 -->
					<td><?php echo $_SESSION['mail'] ?></td> <!-- colonne 2 -->
				</tr>
			</table>
		</div>
		<div id="box-content" class="my-block">
			<button class="pull-right">Modifié mon profil</button>
			<h2>A propos de moi</h2>
			<hr>
			<table>
				<tr> <!-- ligne 1 -->
					<th class="strong-cell"><strong>NOM</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?php echo $_SESSION['prenom'] .' '. $_SESSION['nom'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>AGE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr> <!-- ligne 2 -->
					<th class="strong-cell"><strong>RÉSIDENCE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>EXPÉRIENCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr> <!-- ligne 3 -->
					<th class="strong-cell"><strong>TELEPHONE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>E-MAIL</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><?php echo $_SESSION['mail'] ?></td> <!-- colonne 4 -->
				</tr>
			</table>

			<h2>Test</h2>
			<hr>
			<p>AFFICHER LES RESULTATS DES TESTS</p>
		</div>
	</div>
	
	<?php require('footer.php'); ?>
</body>
</html>