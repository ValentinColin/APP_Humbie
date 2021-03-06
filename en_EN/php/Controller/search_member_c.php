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
if_not_connected($redirection = "../View/login.php");

// récupération des

$search = exist_data("search", False);
$classement = exist_data("classement", False);
$role = $_SESSION['access'];
$triRole = exist_data("triRole", True);
$triOrdre = exist_data("ordre", True);
$typeRecherche = exist_data("searchPeople", false);
$element = exist_data("barreRecherche", false);
$id_manager = exist_data("id_manager", false);
$id_mana = $_SESSION['id'];
$decroissant = false;
$nom = exist_data('nom', false);
$prenom = exist_data('prenom', false);
$needManager = exist_data("needManager", false);
$_SESSION['noOne'] = false;

if ($nom and $prenom) {
    $search = 'OnePeople';
}
if ($typeRecherche) {
    if ($typeRecherche == "searchPrenom") {
        $_SESSION["searchPrenom"] = true;
    } else {
        $_SESSION["searchPrenom"] = false;
    }
    $search = 'OnePeople';
}


switch ($search) {
    case "AllUser":
        if ($classement == 'decroissant') {
            $resultat = getNameLastNameMngOfUser('decroissant');
            $decroissant = true;
        } else {
            $resultat = getNameLastNameMngOfUser();
        }
        $path = "../../View/Admin/searchUser.php"; //
        $_SESSION['search'] = $resultat;
        break;

    case "AllManager":
        if ($classement == 'decroissant') {
            $resultat = getNameLastNameManager('decroissant');
            $decroissant = true;
        } else {
            $resultat = getNameLastNameManager();
        }
        if ($needManager == true) {
            $path = "../../View/Admin/create_user.php";
        } else {
            $path = role($role, " ", "../../View/Manager/searchManager.php", "../../View/Admin/searchManager.php");
        }
        $_SESSION['search'] = $resultat;
        break;

    case "AllMember":
        $resultat = getNameLastNameAllMembers($triOrdre, $triRole);
        $path = role($role, "../../View/User/searchAllMember.php", "../../View/Manager/searchAllMember.php", "../../View/Admin/searchAllMember.php");
        $_SESSION['search'] = $resultat;
        break;

    case "OnePeople":
        if ($nom and $prenom) {
            $resultat = getUserOrManager2($nom, $prenom);
        } else {
            $resultat = getUserOrManager($typeRecherche, $element);
        }
        if ($resultat == null) {
            $_SESSION['noOne'] = true;
            header('location:' . role($role, "../../View/User/simpleSearch.php", "../../View/Manager/simpleSearch.php", "../../View/Admin/simpleSearch.php"));
        }
        $path = role($role, "../../View/User/simpleSearch.php", "../../View/Manager/simpleSearch.php", "../../View/Admin/simpleSearch.php");
        $_SESSION['search'] = $resultat;
        break;

    case "Id_Manager":
        if ($classement == 'decroissant') {
            $decroissant = true;
        }
        $resultat = getUserByManager($id_mana, $classement);
        $path = role($role, "../../View/User/simpleSerch.php", "../../View/Manager/simpleSearch.php", "../../View/Admin/simpleSearch.php");
        $_SESSION['search'] = $resultat;
        break;

    default:
    /* condition très bizarre, elle resoud des problèmes recontrés avec une modif de etienne*/

        header('location:' . role($role, "../../View/User/searchAllMember.php", "../../View/Manager/searchAllMember.php", "../../View/Admin/searchAllMember.php"));
        exit;
}
$_SESSION['triRole'] = $triRole;
$_SESSION['triOrdre'] = $triOrdre;

$_SESSION['decroissant'] = $decroissant;
header("Location: $path");
exit;
