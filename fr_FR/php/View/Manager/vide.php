<?php
session_start();
include('../../Controller/function.php');
verif_access('MANAGER');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<!-- <link rel="stylesheet" type="text/css" href="../../../../css/global.css"> -->
	<!-- Pour fixer le footer en bas de la page -->
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
	<link rel="script" type="text/css" href="../../../../js/drawGraph.js">
</head>

<body>
    <?php require('header.php'); ?>
    <?php require('nav.php') ?>

	<div class="wrapper">
		<div id="box-title" class="my-block">
			<div><a href="../../../../html/building.html" title="Menu"><img class="icon" src="../../../../Images/icon-burger-menu.png"></a></div>
			<h1> Page Principale</h1>
		</div>


	</div>
	<!-- <aside id="blank"></aside> -->
	<!-- Permet de bloquer le footer en bas de l'écran -->
	<?php require('footer.php'); ?>
</body>

</html>