<?php
session_start();
include('../php_pur/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='loginPage.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<link rel="stylesheet" type="text/css" href="../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../css/home.css">
  	<!-- <link rel="icon" href="../../Images/logo_Humbie.png"> Ne fonctionne pas -->
  	<link rel="script" type="text/css" href="../../js/drawGraph.js">
</head>
<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../html/building.html" title="Menu"><img class="icon" src="../../Images/icon-burger-menu.png"></a></div>
			<h1> > Page Principale</h1>
		</div>

		<div id="box-nav" class="my-block">
			<nav id='mainNav'>
				<!-- Navigation (ie. Menu) -->
				<ul id="navigation">
					<li><a id="menu1" href="../../html/building.html" title="section 1 (building...)">section 1 (building...)</a></li>
					<li><a id="menu2" href="../../html/building.html" title="section 2 (building...)">section 2 (building...)</a></li>
					<li><a id="menu3" href="../../html/building.html" title="section 3 (building...)">section 3 (building...)</a></li>
					<li><a id="menu4" href="../../html/building.html" title="section 4 (building...)">section 4 (building...)</a></li>
					<li><a id="menu5" href="../../html/building.html" title="section 5 (building...)">section 5 (building...)</a></li>
				</ul>
			</nav>
		</div>

		<div id="box-content" class="my-block">
			<main onclick="draw()">
				<!-- Corps -->
				<?php
				echo '<p>Bonjour ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>' .
					 '<p>Vous êtes actuellement sur la page principale.</p>';
				?>
				<label>
					<h2>Un graphique</h2>
					<svg id="graphExemple1" width="900" height="450"></svg>
				</label>
			</main>
		</div>
	</div>

	<?php require('footer.php'); ?>
</body>

<script src="../../js/jsGraphDisplay.1.0.js"></script> <!-- Script source permettant de dessiner des graphiques -->
<script src="../../js/drawGraph.js"></script> <!-- Script qui détermine quoi afficher comme graphique (et avec quelles données) -->
<script src="../../js/home.js"></script>

</html>