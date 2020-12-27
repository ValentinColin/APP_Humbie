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
	<title> Pilotes et managers</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/searchPage.css">
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
        <h1 >  Pilotes et Manager </h1>


        <div id='classement'>
           <?php require("../divSearch.php") ?>
        </div>


        <table>
            <tr id='trth'>
                 <th> nom  </th>
                 <th> prénom </th>
                 <th> E-mail </th>
                 <th> Rôle</th>
             </tr>

            <?php for($i=0;$i<count($_SESSION['search']);$i++) :?>
             <tr>
                <td> <?php print_r ( $_SESSION['search'][$i][1]); ?>  </td>
                <td> <?php print_r ($_SESSION['search'][$i][0]); ?>  </td>
                <td> <a href="mailto:service.humbie@gmail.com" title="Contacter <?=$_SESSION['search'][$i][0]?>  par mail"> <?php print_r ($_SESSION['search'][$i][2]); ?>  </a> </td>
                <td> <?php print_r ($_SESSION['search'][$i][3]); ?>  </td>
            <tr>
           <?php  endfor; ?>


        </table>

    </div>

    </main>

	<?php require('footer.php'); ?>
</body>
<script src='../../../js/search.js' > </script>

<?php //$_SESSION['search']=''; ?>
</html>