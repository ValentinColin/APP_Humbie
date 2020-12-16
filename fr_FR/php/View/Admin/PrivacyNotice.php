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
	<title>FAQ</title>
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
	    




    </main>

    <?php require('footer.php'); ?>
</body>

<?php //$_SESSION['search']=''; ?>
</html>