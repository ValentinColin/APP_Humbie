<?php
session_start();
include("../../Controller/function.php");


if_not_connected($redirection="../../View/login.php");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Politique de confidentialité</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/PrivacyNotice.css">

</head>
<body>
    <?php require('header.php'); ?>

    <main>

		<div id="box-nav" class="my-block">
			<?php require('nav.php') ?>
		</div>
	    
		<div id='notice'>
			<h1> Politique de confidentialité </h1>

			<div id='notice_text'>

				<h2>Introduction</h2>

				<p>Dans le cadre de son activité commerciale de constructeur et d’éditeur de programmes et de cartes de tests de pilotes d’avion, © Humbie Corp.  est amenée à traiter des informations vous concernant. Par exemple, en remplissant un formulaire d’inscription, en contactant notre Service clients via la FAQ, en naviguant sur nos sites Internet, en cliquant sur un lien publicitaire que nous vous présentons, vous nous transmettez des informations dont certaines sont de nature à vous identifier (« données personnelles »).</p>
				<p>La présente Politique de confidentialité vous informe de la manière dont nous recueillons et traitons vos données personnelles. Nous vous invitons à la lire attentivement.</p>


				<h2>Responsables du traitement des données</h2>

				<p>Les responsables sont les six membres du comité exécutif de © Humbie Corp. Ils portent la responsabilité de la confidentialité de leurs données et possèdent tous un sens du style éblouissant.</p>


				<h2>Type de données</h2>
				
				<p> données recueillies sont de type nom, prénom, adresse mail, taille de pieds et musique préférée. Nous les recueillons afin de générer un profil le plus complet et le plus personnalisé possible.</p>

				<p>Chacune de ces données est stockée en non-chiffrée sur notre base de donnée sur GitHub, où tout un chacun y a accès s' il dispose du lien : Sécurité assurée ! Personne ne saura jamais que vous avez fait un test avec nos matériels !</p>




				<h2>Quelles finalité pour vos données</h2>

				<p>Étant une société exploitée par un groupe de personnes nous encadrant et à but strictement non lucratif, nous ne trions strictement aucun avantage des données engrangées aux cours des processus décrits plus haut.</p> 
				
				<p>En effet, les seules données présentes sur le site et la base de données sont nos informations personnelles ou des données complètement inventées afin de servir nos tests et nos besoins. Elles ne seront donc jamais utilisées par qui que ce soit pour quoi que ce soit dans n’importe quel monde dans lequel vous vous réincarnerez.</p>

			
				


				

			</div>

		</div>





    </main>

    <?php require('footer.php'); ?>
</body>

<?php //$_SESSION['search']=''; ?>
</html>