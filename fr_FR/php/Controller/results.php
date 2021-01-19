<?php 
session_start();
require_once 'function.php';
require_once '../Model/results.php';


$id = exist_data("id",false);
if (!$id){
    $id = $_SESSION['id'];
}
echo $id;
$resultat = trier(results($id));
$_SESSION['resultat_test'] = $resultat;
goView('my-results.php');
?>