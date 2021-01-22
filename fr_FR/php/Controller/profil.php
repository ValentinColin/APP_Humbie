<?php
session_start();
require_once 'function.php';
require_once '../Model/profilModifier.php';


$id = exist_data("id",false);
if (!$id){
    $id = $_SESSION['id'];
}
$resultat = getprofil($id);
$_SESSION['resultat_profil'] = $resultat;
header('Location: ../../View/Manager/profil.php');
exit;

?>