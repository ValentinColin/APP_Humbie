<?php 
session_start();
include('../php_pur/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../../../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../css/profil.css">
	<link rel="stylesheet" type="text/css" href="../../../css/footer.css">
</head>
<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../../html/building.html" title="Menu"><img class="icon" src="../../../Images/icon-burger-menu.png"></a></div>
			<h1> > Profile</h1>
		</div>
		<div id="box-nav" class="my-block">
			<h2>Professional details</h2>
			<img id="photo_profil_big" src=<?php echo path_photo() ?>>
			<table>
				<tr> <!-- ligne 1 -->
					<td><strong>NAME</strong></td> <!-- colonne 1 -->
					<td><?php echo $_SESSION['prenom'] .' '. $_SESSION['nom'] ?></td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 2 -->
					<td><strong>AGE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 3 -->
					<td><strong>RESIDENCE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 4 -->
					<td><strong>EXPERIENCE</strong></td> <!-- colonne 1 -->
					<td>UNKNOW</td> <!-- colonne 2 -->
				</tr>
				<tr> <!-- ligne 5 -->
					<td><strong>E-MAIL</strong></td> <!-- colonne 1 -->
					<td><?php echo $_SESSION['mail'] ?></td> <!-- colonne 2 -->
				</tr>
			</table>
		</div>
		<div id="box-content" class="my-block">
			<button class="pull-right">Edit my profile</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
			<h2>About me</h2>

			<hr>
			<table>
				<tr> <!-- ligne 1 -->
					<th class="strong-cell"><strong>LAST NAME</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell"><?php echo $_SESSION['prenom'] .' '. $_SESSION['nom'] ?></td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>AGE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr> <!-- ligne 2 -->
					<th class="strong-cell"><strong>RESIDENCE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>EXPERIENCE</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 4 -->
				</tr>
				<tr> <!-- ligne 3 -->
					<th class="strong-cell"><strong>PHONE</strong></td> <!-- colonne 1 -->
					<td class="unstrong-cell">UNKNOW</td> <!-- colonne 2 -->
					<td class="strong-cell"><strong>E-MAIL</strong></td> <!-- colonne 3 -->
					<td class="unstrong-cell"><?php echo $_SESSION['mail'] ?></td> <!-- colonne 4 -->
				</tr>
			</table>

			<br>

			<h2>Test</h2>
			<hr>
			<p>DISPLAY TEST RESULTS</p>
		</div>
	</div>
	
	<?php require('footer.php'); ?>
</body>
</html>