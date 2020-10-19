<?php
session_start();
if(!$_SESSION['connected']){
    header('Location: loginPage.php');
}

function generate_path_photo(){
	return '../Images/Photo/'.$_SESSION['prenom'].$_SESSION['nom'].$_SESSION['id'].'.png';
}

function user_name(){
	return $_SESSION['prenom'].' '.$_SESSION['nom'];
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>

	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
  	<link rel="icon" href="../Images/logo_Humbie.png">
</head>
<body>
<header>
	<!-- En-tête -->
	<ul id="header_nav">
	<li><a href="../html/building.html" title="Menu"><img class="icon" src="../Images/icon-burger-menu.png"></a></li>

		<li><a href="../html/building.html" title="header_nav_HOME"><img class="icon" src="../Images/icon-home.png"></a></li>

		<li><form method="post" action="">
				<input type="text" name="Research" placeholder="Research">
				<span><a id="RechercheAvancer" href=""></a></span>
				<input type="submit" name="Searching button" value="search">
			</form></li>

		<li><a href="../html/building.html" title="header_nav_PARAMETRE"> <img class="icon" src="../Images/icon-settings.png">
	</a></li>

		<li><img id="photo_profil" class="icon" src=<?php echo generate_path_photo() ?>>
			<a href="../html/building.html" title="header_nav_PROFIL"><?php echo user_name() ?></a></li>
		<li><form method="post" action="logout.php">
		<input type="submit" value="déconnexion"></form></li>
	</ul>
</header>
<nav id='mainNav'>
	<!-- Navigation (ie. Menu) -->
	<ul id="navigation">
		<li><a id="menu1" href="../html/building.html" title="section 1 (building...)">section 1 (building...)</a></li>
		<li><a id="menu2" href="../html/building.html" title="section 2 (building...)">section 2 (building...)</a></li>
		<li><a id="menu3" href="../html/building.html" title="section 3 (building...)">section 3 (building...)</a></li>
		<li><a id="menu4" href="../html/building.html" title="section 4 (building...)">section 4 (building...)</a></li>
		<li><a id="menu5" href="../html/building.html" title="section 5 (building...)">section 5 (building...)</a></li>
	</ul>
</nav>
<main onload="draw();">
	<!-- Corps -->
	<hr>
	<?php
	echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>';
	echo '<p>Vous êtes actuellement sur la page principale.</p>';
	?>
	<?php
	for ($i=10; $i < 10; $i++) {
	 	echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
	 } ?>
	 <canvas id="test" height="300" width="300"></canvas>

	<hr>

</main>
<footer>
	<!-- Pied de page -->
	<p>Copyright © 2020 - Humbie Corp. All rights reserved.</p>
	<ul id="footer_nav">
		<li><a href="../html/building.html" title="Politique de confidentialité">Politique de confidentialité</a></li>
		<li><a href="../html/building.html" title="I do something">something</a></li>
		<li><a href="../html/building.html" title="FAQ">FAQ</a></li>
		<li><a href="mailto:valentin.colin78@gmail.com" title="valentin.colin78@gmail.com">Nous contacter</a></li>
		<li><a>Français</a>/<a id="lang_en" href="../html/building.html">English</a></li>
	</ul>
</footer>

</body>

<script src="../js/main.js"></script>

</html>