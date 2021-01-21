<?php 
session_start();
require_once 'function.php';
require_once '../Model/results.php';

$nbr = exist_data("nbr",false);

if (!$nbr){
    $nbr = 60;
}else{
    $nbr = $nbr*6;
}
$id = $_SESSION['id'];
$resultat = trier(resultsByManager($id,$nbr));
$_SESSION['resultat_test'] = $resultat;
goView('fluxTest.php');
?>