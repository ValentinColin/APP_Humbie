<?php
include("login_bdd.php");

function banned(int $id,int $toBanned)
{
    $connexion = login_bdd();
    if($toBanned==0){
    $requete=$connexion->prepare("UPDATE members SET banned=1 WHERE id='$id'");
    }
    else{
    $requete=$connexion->prepare("UPDATE members SET banned=0 WHERE id='$id'");
    }
    $requete->execute();
    return true;
}
?>