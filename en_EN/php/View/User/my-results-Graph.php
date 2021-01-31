<?php
include_once("../../Controller/function.php");
include_once('../../Model/results.php');
verif_access('USER');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Profile</title>
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
        <h1 id="title">My results :  </h1>
        <form action="../../Controller/results.php" method="GET">
            <label for="nbrres">Number of results to show</label>
            <input id="nbrres" type="text" name="nbr"><br>
            <label for="graph">Display as a graphic ?</label>
            <input id="graph" type="checkbox" name='graph'> <br>
            <input id="sub" type="submit" value="Submit">
        </form>
        <?php
            foreach($_SESSION['resultat_test'] as $element){
        ?>  
        <h2 id="sous-titre">Results of the <?= $element[0][0] ?> made at the examination centre of <?= $element[0][1] ?> </h1>      
        <br>
        <div class="test-box">   
            <div class="cell">
                <h3 class="sous-sous-titre">Taking the heart rate</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: BPM</th>
                        <?php
                            $table = stats($element[1]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4] ?>_1.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">AVERAGE: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>
        
            <div class="cell">
                <h3 class="sous-sous-titre">Taking the temperature</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: °C</th>
                        <?php
                            $table = stats($element[2]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+1 ?>_2.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">AVERAGE: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>      

            <div class="cell">
                <h3 class="sous-sous-titre">Reproduction of a sound with the voice</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: Hz</th>
                        <?php
                            $table = stats($element[3]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+2 ?>_3.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">AVERAGE: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div> 
            <div class="cell">
                <h3 class="sous-sous-titre">Reaction time to unexpected sound</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: ms</th>
                        <?php
                            $table = stats($element[4]);
                        ?>
                        <img src='../../../../Images/Resultats/test<?= $element[0][4]+3 ?>_4.png' >
                    </th>   
                </table>
                <div class="stats">
                    <div class="stats-value">MIN: <?= $table[0] ?></div>
                    <div class="stats-value">AVERAGE: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>
            <div class="cell">
                <h3 class="sous-sous-titre">Reaction time to expected light</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: ms</th>
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
                    <div class="stats-value">AVERAGE: <?= $table[1] ?></div>
                    <div class="stats-value">MAX: <?= $table[2] ?></div>
                </div>
            </div>
            <div class="cell">
                <h3 class="sous-sous-titre">Audible frequency range</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: Hz</th>
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
           
        </div>   
        

    <?php }?>
    </div>
            

	<span id="footer-position">
		<?php require('footer.php'); ?>
    </span>
    
</body>

</html>