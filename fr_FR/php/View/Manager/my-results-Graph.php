<?php
include_once("../../Controller/function.php");
include_once('../../Model/results.php');
verif_access('MANAGER');
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
        <?php 
        if(!isset($_SESSION['resultat_test']) || $_SESSION['resultat_test']== null){
        ?>
            <h1 id="title">L'utilisateur n'a pas encore fait de tests.  </h1>
        <?php
        }else{
        ?>
            <h1 id="title">Résultats de <?= $_SESSION['resultat_test'][0][0][2]." ".$_SESSION['resultat_test'][0][0][3] ?>  </h1>

        <form action="../../Controller/results.php" method="GET">
            <label for="nbrres">Nombre de résultats à afficher</label>
            <input id='hide' type="text" name="id" value="<?= $_SESSION['resultat_test'][0][0][5]?>" >
            <input id="nbrres" type="text" name="nbr"><br>
            <label for="graph">Afficher sous forme de graphique ?</label>
            <input id="graph" type="checkbox" name='graph'> <br>
            <input id="sub" type="submit" value="Soumettre">
        </form>
        <?php
            foreach($_SESSION['resultat_test'] as $element){
        ?>  
        <h2 id="sous-titre">Résultats de la session du <?= $element[0][0] ?> fait au centre d'examen de <?= $element[0][1] ?> </h2>   
        <br>
        <div class="test-box">   
            <div class="cell">
                <h3 class="sous-sous-titre">Prise de la fréquence cardiaque</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: BPM</th>
                        <?php
                            $table = stats($element[1]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4] ?>_1.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MOY: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>
        
            <div class="cell">
                <h3 class="sous-sous-titre">Prise de la température</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: °C</th>
                        <?php
                            $table = stats($element[2]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+1 ?>_2.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MOY: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>      

            <div class="cell">
                <h3 class="sous-sous-titre">Reproduction d'un son avec la voix</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: Hz</th>
                        <?php
                            $table = stats($element[3]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+2 ?>_3.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MOY: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div> 
            <div class="cell">
                <h3 class="sous-sous-titre">Temps de réaction à un son inattendu</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: ms</th>
                        <?php
                            $table = stats($element[4]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+3 ?>_4.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MOY: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>
            <div class="cell">
                <h3 class="sous-sous-titre">Temps de réaction à une lumière attendue</h3>
                <table id="table-main">

                    <th id = 'cell-value'>Unité: ms</th>
                        <?php
                            $table = stats($element[5]);
                            foreach($element[5] as $value){
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
            <div class="cell">
                <h3 class="sous-sous-titre">Plage de fréquence audible</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unité: Hz</th>
                        <?php
                            $table = stats($element[6]);
                            foreach($element[6] as $value){
                                echo "<th id = 'cell-value' >$value</td>";
                            }
                        ?>
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div> 

        <?php    
        }
        ?>
        </div>   
        

    <?php }?>
    </div>

	<span id="footer-position">
		<?php require('footer.php'); ?>
    </span>
    
</body>

</html>