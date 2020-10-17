<?php
session_start();
if(!$_SESSION['connected']){
    header('Location: maquette.php');
}

function generate_path_photo(){
	return '../Images/Photo/'.$_SESSION['prenom'].$_SESSION['nom'].$_SESSION['id'].'.jpg';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>
<body>
<header>
	<!-- En-tête -->
	<ul id="header_nav">
		<li><a href="#" title="Menu"><img id="icon_burger_menu" src="../Images/icon-burger-menu.png"></a></li>
		<li><a href="#" title="header_nav_HOME">Home (icone)</a></li>
		<li><form method="post" action="">
				<input type="text" name="Research" placeholder="Research">
				<span><a id="RechercheAvancer" href="">Recherche avancer</a></span>
				<input type="submit" name="Searching button" value="Search">
			</form></li>
		<li><a href="#" title="header_nav_PARAMETRE">Paramètres (icone)</a></li>
		<li><img id="photo_profil" src=<?php echo generate_path_photo() ?>><a href="#" title="header_nav_PROFIL"><?php echo $_SESSION['prenom'].' '.$_SESSION['nom'] ?></a></li>
		<li><form method="post" action="logout.php"><input type="submit" value="déconnexion"></form></li>
	</ul>
</header>
<nav>
	<!-- Navigation (ie. Menu) -->
	<ul id="navigation">
		<li><a href="#" title="aller à la section 1 (en cours de construction)">section 1 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 2 (en cours de construction)">section 2 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 3 (en cours de construction)">section 3 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 4 (en cours de construction)">section 4 (en cours de construction)</a></li>
		<li><a href="#" title="aller à la section 5 (en cours de construction)">section 5 (en cours de construction)</a></li>
	</ul>
</nav>
<main>
	<!-- Corps -->
	<hr>
	<?php 
	echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>';
	echo '<p>Vous êtes actuellement sur la page principale.</p>';
	?>
	<hr>

</main>
<footer>
	<!-- Pied de page -->
	<p>Copyright © 2020 - Humbie Corp. All rights reserved.</p>
	<ul id="footer_nav">
		<li><a href="#" title="Politique de confidentialité">Politique de confidentialité</a></li>
		<li><a href="#" title="I do something">something</a></li>
		<li><a href="#" title="FAQ">FAQ</a></li>
		<li><a href="mailto:valentin.colin78@gmail.com" title="valentin.colin78@gmail.com">Nous contacter</a></li>
		<li><a id="lang_fr" href="../fr/main.php">Français</a>/<a id="lang_en" href="../fr/main.php">English</a></li>
	</ul>
</footer>

</body>
</html>