<?php
include_once("../../Controller/function.php");
include_once('../../Model/results.php');
verif_access('MANAGER');
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
        <?php 
        if(!isset($_SESSION['resultat_test']) || $_SESSION['resultat_test']== null){
        ?>
            <h1 id="title">The user has not yet carried out any tests.  </h1>
        <?php
        }else{
        ?>
            <h1 id="title">Results from <?= $_SESSION['resultat_test'][0][0][2]." ".$_SESSION['resultat_test'][0][0][3] ?>  </h1>

        <form action="../../Controller/results.php" method="GET">
            <label for="nbrres">Number of results to show</label>
            <input id='hide' type="text" name="id" value="<?= $_SESSION['resultat_test'][0][0][5]?>" >
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
                            foreach($element[1] as $value){
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
                <h3 class="sous-sous-titre">Taking the temperature</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: °C</th>
                        <?php
                            $table = stats($element[2]);
                            foreach($element[2] as $value){
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
                <h3 class="sous-sous-titre">Reproduction of a sound with the voice</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: Hz</th>
                        <?php
                            $table = stats($element[3]);
                            foreach($element[3] as $value){
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
                <h3 class="sous-sous-titre">Reaction time to unexpected sound</h3>
                <table id="table-main">
                    <th id = 'cell-value'>Unit: ms</th>
                        <?php
                            $table = stats($element[4]);
                            foreach($element[4] as $value){
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
        

    <?php }}?>
    </div>

	<span id="footer-position">
		<?php require('footer.php'); ?>
    </span>
    
</body>

</html>