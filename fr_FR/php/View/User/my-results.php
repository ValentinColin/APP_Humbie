<?php
include_once("../../Controller/function.php");
include_once('../../Model/results.php');
verif_access('USER');
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
        <h1 id="title">Mes résultats:</h1>
        <form action="../../Controller/results.php" method="GET">
            <label for="nbrres">Nombre de résultats à afficher</label>
            <input id="nbrres" type="text" name="nbr"><br>
            <label for="graph">Afficher sous forme de graphique ?</label>
            <input id="graph" type="checkbox" name='graph'> <br>
            <input id="sub" type="submit" value="Soumettre">
        </form>
        <?php
            foreach($_SESSION['resultat_test'] as $element){
        ?>  
        <h2 id="sous-titre">Résultats de la session du <?= $element[0][0] ?> fait au centre d'examen de <?= $element[0][1] ?> </h1>      
        <br>
        <div class="test-box">

            <div class="cell">
                <h3 class="sous-sous-titre">Reproduction d'un son avec la voix</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: Hz</th>
                        <?php
                            $table = stats($element[1][0]);
                            foreach($element[1][0] as $value){
                                echo "<th id = 'cell-value' >$value</td>";
                            }
                        ?>
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MOY: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div> 

           
        </div>   
        

    <?php }?>
    </div>

	<span id="footer-position">
		<?php require('footer.php'); ?>
    </span>
    
</body>

</html>