
<?php
require_once '../Model/search_member_m.php';
/*
Listes des fonctions du fichier importé :
function getNameLastNameMngOfUser(String $ordre=''):array--> ligne 14
function getNameLastNameManager(String $ordre=''):array  --> ligne 37
function getNameLastNameAllMembers(String $ordre=''):array --> ligne 60
function getUserOrManager(String $nom, String $prenom):array --> ligne 82
*/
echo " <pre>";
print_r(getUserOrManager("Lin","Alexandre"));// test
echo " <pre>";
?>

