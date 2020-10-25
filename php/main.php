<?php
session_start();
include('function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<link rel="stylesheet" type="text/css" href="../css/config.css">
	<link rel="stylesheet" type="text/css" href="../css/header.css">
	<link rel="stylesheet" type="text/css" href="../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
  	<!-- <link rel="icon" href="../Images/logo_Humbie.png"> Ne fonctionne pas -->
</head>
<body>
	<?php require('header.php'); ?>
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

	<?php require('footer.php'); ?>
</body>

<script src="../js/main.js"></script>

</html>