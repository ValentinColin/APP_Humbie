<?php
session_start();
include("../../Controller/function.php");
include("../../Model/faq.php");
verif_access('MANAGER');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FAQ</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/faq.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../../css/faq.css"> -->
</head>

<body>
	<?php require('header.php'); ?>
	<?php require('nav.php') ?>
    <img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">


	<main>
		<div class="wrapper">
			<h1 id="title">Foire aux questions</h1>
			<div id="box-read-FAQ" class="my-block">
				<?php // Boucle pour afficher les élements: question/réponse
				$faq = getFAQ();
				for ($i = 0; $i < count($faq); $i++) { ?>
					<div class='faq_Box_element'>
						<h2>Question n°<?= $i + 1 ?>:</h2>
						<p class='question'><?= $faq[$i]["question"] ?></p>
						<p class='answer'><?= $faq[$i]["answer"] ?></p>
					</div>
					<hr>
				<?php } ?>
			</div>
		</div>

	</main>

	<span id="footer-position">
		<?php require('footer.php'); ?>
	</span>
</body>

</html>