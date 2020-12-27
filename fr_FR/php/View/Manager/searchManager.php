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
        <h1 >  Les managers </h1>


        <div id='classement'>
        <span> classé les noms par ordre: <span>
        <a href="../../Controller/search_member_c.php/?search=AllManager">
        <input type='button' value='croissant'
        <?php if( !$_SESSION['decroissant']) :?> disabled title='tri déjà effectif'  <?php endif ?> >
        </a>


        <a href="../../Controller/search_member_c.php/?search=AllManager&classement=decroissant">
       <input type='button' value='décroissant'
       <?php if( $_SESSION['decroissant']) :?> disabled title='tri déjà effectif'  <?php endif ?> >
        </a>
        </div>


        <table>
            <tr>
                 <th> nom </th>
                 <th> prénom </th>
                 <th> E-mail </th
             </tr>

            <?php for($i=0;$i<count($_SESSION['search']);$i++) :?>
             <tr>
                <td> <?php print_r ( strtoupper($_SESSION['search'][$i][1])); ?>  </td>
                <td> <?php print_r ($_SESSION['search'][$i][0]); ?>  </td>
                <td> <a href="mailto:service.humbie@gmail.com" title="Contacter <?=$_SESSION['search'][$i][0]?>  par mail"> <?php print_r ($_SESSION['search'][$i][2]); ?>  </a> </td>
            <tr>
           <?php  endfor; ?>


        </table>

    </div>

    </main>



	<?php require('footer.php'); ?>
</body>

<?php //$_SESSION['search']=''; ?>
</html>