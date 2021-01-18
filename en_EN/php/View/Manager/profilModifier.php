<?php
include("../../Controller/function.php");
include('../../Model/profilModifier.php');
if_not_connected($redirection = "../../View/login.php");


$profil = getprofil();

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = '../../View/login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/profil.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php'); ?>

	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

	<div class="wrapper">
		<div id="box-nav" class="my-block">
			<img id="photo_profil_big" src=<?= path_photo() ?>>
			<table>
				<tr>
    				<form method="post" action="../../Controller/profilModifier.php" enctype="multipart/form-data">
					<tr>	
						<td class="unstrong-cell"> <label  class="photo-modifier" for="file" id="button-profil-modifier">Choose a file</label><input  id="file" type="file" name="photo"></td>
					</tr>	
					<tr>	
						<td class="unstrong-cell"><input   class="photo-modifier" id="button-send-photo" type="submit" value="Valider l'envoi du fichier"></td>
					</tr>	
					</form>
				</tr>
			</table>
		</div>
		<div id="box-content" class="my-block">
        	<form method="post" action="../../Controller/profilModifier.php">
			<h1>Personnal informations</h1>

			<table>
				<tr>
					<!-- ligne 1 -->
					<th class="strong-cell"><strong>LAST NAME:</strong> <?= $_SESSION['prenom'] . ' ' . $_SESSION['nom'] ?></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>BIRTHDAY DATE:</strong> <input type="text" name="birthday_date" value="<?= $profil['birthday_date'] ?>"></td>  <!-- colonne 3 -->

				</tr>
				<tr>
					<!-- ligne 2 -->
					<th class="strong-cell"><strong>COUNRTY:</strong> <input type="text" name="country" value="<?= $profil['country'] ?>"> </td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>EXPERIENCE:</strong> UNKNOW</td> <!-- colonne 3 -->

				</tr>
				<tr>
					<!-- ligne 3 -->
					<th class="strong-cell"><strong>PHONE</strong> <input type="text" name="phone"  value="<?= $profil['phone'] ?>"></td> <!-- colonne 1 -->
					<td class="strong-cell"><strong>E-MAIL</strong> <input type="text" name="email" value="<?= $profil['email'] ?>"></td> <!-- colonne 3 -->
				</tr>
			</table>
			<button id="button-profil-modifier" class="pull-right">Submit changes</button> <!-- Ce bouton doit être placer avant le h2 à cause du float (à modifier plus tard) -->
			</form>

			<h1 id="password-title">Modify password</h1>
			<form method="post" action="../../Controller/profilModifier.php">
				<table>
					<?php 
					if(isset($_SESSION['passwordError'])){
						if ($_SESSION['passwordError'] == 'ok'){
							echo '<td class="strong-cell"><strong>Your password has been changed successfully</strong></td>';
						}
						elseif ($_SESSION['passwordError'] == 'new'){
							
							echo "<td class='strong-cell'><strong>The confirmation field is not the same as the new password</strong></td>";
						}
						elseif ($_SESSION['passwordError'] == 'old'){
							echo '<td class="strong-cell"><strong>Incorrect password</strong></td>';
						}
						unset($_SESSION['passwordError']);
					}
					?>
					<tr>
						<th class="unstrong-cell"><input type="password" placeholder="Mot de passe actuel" name="password" ></td>	
					</tr>
					<tr>
						<th class="unstrong-cell"><input type="password" placeholder="Nouveau mot de passe" name="newpassword"></td>
						<th class="unstrong-cell"><input type="password" placeholder="Confirmer mot de passe" name="repetpassword" ></td>	
					</tr>
					<tr>
					<th class="unstrong-cell"><input id="button-profil-modifier" type="submit" value="Modifier" ></td>	
						
					</tr>
				</table>
			</form>

			<br>
		</div>
	</div>

	<?php require('footer.php'); ?>
</body>

</html>