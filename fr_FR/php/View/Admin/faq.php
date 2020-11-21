<?php
session_start();
include("../../Controller/function.php");
include("../../Model/faq.php");

if_not_connected($redirection="../../View/login.php");

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
	<!-- <link rel="stylesheet" type="text/css" href="../../../../css/faq.css"> -->
</head>
<body>
	<?php require("../../View/Admin/header.php"); ?>

	<div class="wrapper">
		<div id="box-add-question" class="my-block">
			<form method="post" action="../../Controller/faq.php">
		        <input type="text" name="question" placeholder="Question">
		        <input type="text" name="answer"   placeholder="Réponse">
		        <input type="submit" name="add" value="Ajouter">
			</form>
		</div>
		<br>
		<div id="box-read-FAQ" class="my-block">
			<?php // Boucle pour afficher les élements: question/réponse
			$faq = getFAQ();
			for ($i=0; $i < count($faq); $i++) { ?>
				<div class='faq_Box_element'>
					<h2>Question n°<?= $i+1 ?>:</h2>
					<p class='question'><?= $faq[$i]["question"] ?></p>
					<p class='answer'><?= $faq[$i]["answer"] ?></p>
					<form method="post" action="../../Controller/faq.php">
						<?= "<input type='submit' name='" . $faq[$i]["id"] . "' value='Supprimer'>" ?>
					</form>
				</div>
				<hr>
			<?php } ?>
		</div>
	</div>

	<?php require("../../View/Admin/footer.php"); ?>
</body>
</html>