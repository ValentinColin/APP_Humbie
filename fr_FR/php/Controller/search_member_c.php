
<?php
session_start();
require_once '../Model/search_member_m.php';
require_once 'function.php';
/*
Listes des fonctions importées utilisées :
1- importées de search_member_m.php
function getNameLastNameMngOfUser(String $ordre=''):array--> ligne 14
function getNameLastNameManager(String $ordre=''):array  --> ligne 37
function getNameLastNameAllMembers(String $ordre=''):array --> ligne 60
function getUserOrManager(String $nom, String $prenom):array --> ligne 82

2- importées de function.php
if_not_connected(redirection)-> vérifie qu'une session existe, sinon, redirection vers la page d'accueil
exist_data(Strig data, post=true) -> verifie si la session existe en la renvoie aprs l'avoir sécurisé.
*/

// Vérififier si un utilisateur est connecter avant de récupérer des données.
echo ' 474';
if_not_connected($redirection="../View/login.php");


// récupération des
$search=exist_data("search",False);
$classement =exist_data("classement",False);
$nom=exist_data('nom',False);
$prenom=exist_data('prenom',False);


switch($search){
    case "AllUser" :
        if($classement){
            getNameLastNameMngOfUser('decroissant');
        }else{
            getNameLastNameMngOfUser();
        }
        $path="../View/Admin/search_all_uom.php";// uom for user or manager
        $_SESSION['search']='AllUser';
        break;

    case "AllManager" :
        if($classement){
            getNameLastNameManager('decroissant');
        }else{
            getNameLastNameManager();
        }
        $path="../View/Admin/search_all_uom.php";
        $_SESSION['search']='AllManager';
        break;

    case "AllMembers":
        if($classement){
            getNameLastNameAllMembers('decroissant');
        }else{
            getNameLastNameAllMembers();
        }
        $path="../View/Admin/search_all_uom.php";
        $_SESSION['search']='AllMembers';
        break;

    case "OnePeople" :
        getUserOrManager($nom,$prenom);
        $path="../View/Admin/search_uom.php";
        $_SESSION['search']='OnePeople';
        break;
    default :
        header('location : ../View/Admin/home.php');
        exit;
}
    header('location : '.$path);
    exit;

?>

