<?php 
include("login_bdd.php");
session_start();


function getprofil(){

    $bdd = login_bdd();
    $req = $bdd->query('SELECT `email`, `birthday_date`, `country`, `phone` FROM `members`
    WHERE `id` = '.$_SESSION['id']);

    return $req->fetch();
} 

function modifierprofil($email,$birthday_date,$country,$phone){
    $bdd = login_bdd();
    $req = $bdd->prepare('UPDATE `members` 
    SET `email`=:email,
        `birthday_date`=:birthday_date,
        `country`=:country,
        `phone`=:phone
    WHERE `id` = '.$_SESSION['id']);

    $req->execute(array(
        ':email' => $email,
        ':birthday_date' => $birthday_date,
        ':country' => $country,
        ':phone' => $phone
    ));


}





?>