
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

if_not_connected($redirection="../View/login.php");


// récupération des
$search=exist_data("search",False);
$classement =exist_data("classement",False);
$nomPrenom=exist_data('searchBar',False);

$nom=null;
$prenom=null;
if($nomPrenom!='0'){
    $separer=explode(" ",$nomPrenom);
    $prenom=$separer[0];
    $nom=$separer[1];

    if(count($nom) <1){$nom='nomVide';}

    $search='OnePeople';
    echo $nom.' '.$prenom;
}
$decroissant=false;
$_SESSION['noOne']=false;

switch($search){
    case "AllUser" :
        if($classement=='decroissant'){
            $resultat=getNameLastNameMngOfUser('decroissant');
            $decroissant=true;

        }else{
            $resultat=getNameLastNameMngOfUser();
        }
        $path="../../View/Admin/searchUser.php";// uom for user or manager
        $_SESSION['search']=$resultat;
        break;

    case "AllManager" :
        if($classement=='decroissant'){
            $resultat=getNameLastNameManager('decroissant');
            $decroissant=true;
        }else{
            $resultat=getNameLastNameManager();
        }
        $path="../../View/Admin/searchManager.php";
        $_SESSION['search']=$resultat;
        break;

    case "AllMember":
        if($classement=='decroissant'){
            $resultat=getNameLastNameAllMembers('decroissant');
            $decroissant=true;
        }else{
            $resultat=getNameLastNameAllMembers();
        }
        $path="../../View/Admin/searchAllMember.php";
        $_SESSION['search']=$resultat;
        break;

    case "OnePeople" :

        $resultat=getUserOrManager($nom,$prenom);

        if($resultat==null){
            $resultat=getUserOrManager($prenom,$nom);

            if($resultat==null){
                $_SESSION['noOne']=true;
                header('location: ../../View/Admin/simpleSearch.php');
            }
        }

        $path="../../View/Admin/simpleSearch.php";
        $_SESSION['search']=$resultat;
        break;
    default :

        header('location: ../../View/Admin/home.php');
        exit;
}

$_SESSION['decroissant']=$decroissant;
    header("Location: $path");
    exit;




?>

