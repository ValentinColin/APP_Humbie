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
	<link rel="stylesheet" type="text/css" href="../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../css/home.css">
  	<!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
  	<link rel="script" type="text/css" href="../../../js/drawGraph.js">
</head>
<body>
	<?php require('header.php'); ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../../html/building.html" title="Menu"><img class="icon" src="../../../Images/icon-burger-menu.png"></a></div>
			<h1> > Page Principale</h1>
		</div>

		<div id="box-nav" class="my-block">
			<nav id='mainNav'>
				<!-- Navigation (ie. Menu) -->
				<ul id="navigation">
					<li><a href="../../../html/building.html">--- USERS ---</a></li>
					<li><a href="../../../html/building.html">Dernier test (Users)</a></li>
					<li><a href="../../../html/building.html">Historique des Tests (Users)</a></li>
					<li><a href="../../../html/building.html">Planning (Users)</a></li>
					<li><a href="../../../html/building.html">FAQ (Users)</a></li>
					<li><a href="../../../html/building.html">Support (Users)</a></li>
					<li><a href="../../../html/building.html">----------------</a></li>
					<li><a href="../../../html/building.html">--- Managers ---</a></li>
					<li><a href="../../../html/building.html">Pilotes /ie.Users (Managers)</a></li>
					<li><a href="../../../html/building.html">Planning et gestion (Managers)</a></li>
					<li><a href="../../../html/building.html">Statistiques (Managers)</a></li>
					<li><a href="../../../html/building.html">FAQ (Managers)</a></li>
					<li><a href="../../../html/building.html">Support (Managers)</a></li>
					<li><a href="../../../html/building.html">-------------</a></li>
					<li><a href="../../../html/building.html">--- ADMIN ---</a></li>
					<li><a href="../../../html/building.html">Managers (Admin)</a></li>
					<li><a href="../../../html/building.html">Pilotes /ie.Users (Admin)</a></li>
					<li><a href="../../../html/building.html">Gestion des tickets (Admin)</a></li>
					<li><a href="../../../html/building.html">Gestion de la FAQ (Admin)</a></li>
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

</html>