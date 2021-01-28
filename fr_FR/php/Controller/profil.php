<?php
session_start();
require_once 'function.php';
require_once '../Model/profilModifier.php';


$id = exist_data("id",false);
$pourManager=exist_data("special",false);

if (!$id){
    $id = $_SESSION['id'];
}

$resultat = getprofil($id);
$_SESSION['resultat_profil'] = $resultat;
if($pourManager=="vrai"){
    header('Location: ../../View/manager/profil.php');
    exit;
}
goView('profil.php');
exit;

?>