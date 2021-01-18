<?php

include_once("../../Controller/function.php");
include_once('../../Model/results.php');

// On vérifie toujours si le visiteur est connecté, sinon on le redirige vers la page demander
if_not_connected($redirection = '../../View/login.php');

?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="../../../../css/config.css">
	<!-- <link rel="stylesheet" type="text/css" href="../../../css/default.css"> -->
	<link rel="stylesheet" type="text/css" href="../../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/results.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
</head>

<body>

	<?php require('header.php'); ?>
	<?php require('nav.php'); ?>

	<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">
	<div class="wrapper">
        <h1 id="title">Mes résultats</h1>
        <?php
            $data = trier(results($_SESSION['id']));
            foreach($data as $element){
        ?>  
        <h2 id="sous-titre">Résultats de la session du <?= $element[0][0] ?> fait au centre d'examen de <?= $element[0][1] ?> </h1>      
        <br>
        <table id="table-main">
            <tr id="tr-main" >
                <th id="left" >
                    <table  class="cell">
                        <tr>
                            <th id = 'cell-value'>Unité: BPM</th>
                            <?php
                                foreach($element[1] as $value){
                                    echo "<th id = 'cell-value' >$value</th>";
                                }
                            ?>
                        </tr>
                        <tr>
                            <th>MINIMUM:</th>
                            <th>MOYENNE:</th>
                            <th>MAXIMUM:</th> 
                        </tr>
                    </table>
                </th>

                <th id="right" class="cell">
                    <table>
                        <th>MINIMUM:</th>
                        <th>MOYENNE:</th>
                        <th>MAXIMUM:</th>
                    </table>
                </th>
                
            </tr>
            <tr id="tr-main">
                <th id="left" class="cell">
                    <table>
                        <th>MINIMUM:</th>
                        <th>MOYENNE:</th>
                        <th>MAXIMUM:</th>
                    </table>
                </th>
                <th id="right" class="cell">
                    <table>
                        <th>MINIMUM:</th>
                        <th>MOYENNE:</th>
                        <th>MAXIMUM:</th>
                    </table>
                </th>
            </tr>
            <tr id="tr-main">
                <th id="left" class="cell">
                    <table>
                        <th>MINIMUM:</th>
                        <th>MOYENNE:</th>
                        <th>MAXIMUM:</th>
                    </table>
                </th>
                <th id="right" class="cell">
                    <table>
                        <th>MINIMUM:</th>
                        <th>MOYENNE:</th>
                        <th>MAXIMUM:</th>
                    </table>
                </th>
                
            </tr>
            
        </table>
        <?php
            }
        ?>

    </div>

	<span id="footer-position">
		<?php require('footer.php'); ?>
    </span>

</body>

</html>