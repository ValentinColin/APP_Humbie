<?php 
session_start();
require_once 'function.php';
require_once '../Model/results.php';


$id = $_SESSION['id'];
$resultat = trier(resultsByManager($id));
$_SESSION['resultat_test'] = $resultat;
goView('fluxTest.php');
?>