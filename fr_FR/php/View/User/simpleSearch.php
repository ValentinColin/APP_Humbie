<?php
session_start();
include('../../Controller/function.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection='../../View/login.php');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Humbie</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/searchManager.css">
  	<!-- <link rel="icon" href="../../../Images/logo_Humbie.png"> Ne fonctionne pas -->
  	<link rel="script" type="text/css" href="../../../../js/drawGraph.js">
</head>
<body>
	<?php require('header.php'); ?>

    <main>

		<div id="box-nav" class="my-block">
            <?php require('nav.php') ?>
		</div>
	</div>

    <div id='search-page'>
        <h1 > Resultat de recherche </h1>


    <?php if ($_SESSION['noOne']) :?>
        <p> L'utilisateur recherché n'existe pas </p>
    <?php endif; ?>


    <?php if (!$_SESSION['noOne']) :?>

    <table>
    <tr>
         <td> nom :   <strong>  <?php print_r( strtoupper($_SESSION['search'][0][0])); ?> </strong>  </td>
         <td> penom :   <strong> <?php print_r($_SESSION['search'][0][1]); ?> </strong>  </td>
         <td> Rôle :   <strong> <?php print_r($_SESSION['search'][0][2]); ?> </strong>  </td>

    <tr>
    </table>





    <?php endif; ?>

    </div>

    </main>



	<?php require('footer.php'); ?>
</body>

<?php //$_SESSION['search']=''; ?>
</html>