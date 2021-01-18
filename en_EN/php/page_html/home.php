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
			<h1> > Home Page</h1>
		</div>

		<div id="box-nav" class="my-block">
			<nav id='mainNav'>
				<!-- Navigation (ie. Menu) -->
				<ul id="navigation">
					<li><a href="../../../html/building.html">--- USERS ---</a></li>
					<li><a href="../../../html/building.html">Last test (Users)</a></li>
					<li><a href="../../../html/building.html">Historic of the tests (Users)</a></li>
					<li><a href="../../../html/building.html">Planning (Users)</a></li>
					<li><a href="User/faq.php">FAQ (Users)</a></li>
					<li><a href="User/ticket.php">Support (Users)</a></li>
					<li><a href="../../../html/building.html">----------------</a></li>
					<li><a href="../../../html/building.html">--- Managers ---</a></li>
					<li><a href="../../../html/building.html">Pilots /ie.Users (Managers)</a></li>
					<li><a href="../../../html/building.html">Planning and gestion (Managers)</a></li>
					<li><a href="../../../html/building.html">Statistics (Managers)</a></li>
					<li><a href="../../../html/building.html">FAQ (Managers)</a></li>
					<li><a href="Manager/ticket.php">Support (Managers)</a></li>
					<li><a href="../../../html/building.html">-------------</a></li>
					<li><a href="../../../html/building.html">--- ADMIN ---</a></li>
					<li><a href="../../../html/building.html">Managers (Admin)</a></li>
					<li><a href="../../../html/building.html">Pilots /ie.Users (Admin)</a></li>
					<li><a href="Admin/ticket.php">Gestion of tickets (Admin)</a></li>
					<li><a href="Admin/faq.php">Gestion of the FAQ (Admin)</a></li>
				</ul>
			</nav>
		</div>

		<div id="box-content" class="my-block">
			<main onclick="draw()">
				<!-- Corps -->
				<?php
				echo '<p>Hello ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' !</p>' .
					 '<p>You are currently on the main page.</p>';
				?>
				<label>
					<h2>A graph</h2>
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