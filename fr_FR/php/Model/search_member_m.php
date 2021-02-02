<?php

include("login_bdd.php");
/*
Listes des fonctions :
function getNameLastNameMngOfUser(String $ordre=''):array--> ligne 14
function getNameLastNameManager(String $ordre=''):array  --> ligne 37
function getNameLastNameAllMembers(String $ordre=''):array --> ligne 60
function getUserOrManager(String $nom, String $prenom):array --> ligne 82
*/
//Recupère,nom prenom et id managers des utilisateurs et les classes
// par odre croissant ou decroissant, suivant le parametre
function getNameLastNameMngOfUser(String $ordre = ''): array
{
    try {
        $connexion = login_bdd(); // connexion à la bdd
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // en cas d'erreur
        if ($ordre == "decroissant") { // si decroissant, classement par ordre decroissant
            $requete = $connexion->prepare("SELECT prenom,nom,id_manager FROM members WHERE access='USER' ORDER BY nom DESC");
            $requete = $connexion->prepare("SELECT U.nom, U.prenom, M.nom, M.prenom
                                            FROM members U
                                                LEFT JOIN members M
                                                ON U.id_manager = M.id
                                                WHERE U.access='USER'
                                                ORDER BY U.nom DESC");
        } else { // sinonn, classement des utilisateur par ordre croissant
            $requete = $connexion->prepare("SELECT U.nom, U.prenom, M.nom, M.prenom
                                            FROM members U
                                                LEFT JOIN members M
                                                ON U.id_manager = M.id
                                                WHERE U.access='USER'
                                                ORDER BY U.nom ASC");
        }
        $requete->execute(); // récupération des données
        return $requete->fetchall(); // tableau contenant les données récupérées
    } catch (PDOException $e) {
        return null;
    }
}

//Recupère,nom prenom managers  des et les classes
// par odre croissant ou decroissant, suivant le parametre.
function getNameLastNameManager(String $ordre = ''): array
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($ordre == "decroissant") {
            $requete = $connexion->prepare("SELECT prenom,nom,email,id FROM members WHERE access='MANAGER' ORDER BY nom DESC");
        } else {
            $requete = $connexion->prepare("SELECT prenom,nom,email,id FROM members WHERE access='MANAGER' ORDER BY nom ASC");
        }
        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}

//Recupère,nom, prenom et roles des managers et admin et users,
// par odre croissant ou decroissant, suivant le parametre.
function getNameLastNameAllMembers(String $triOrdre, $triRole): array
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($triOrdre == "decroissant" and $triRole == "oui") {
            $requete = $connexion->prepare("SELECT nom,prenom,email,access,banned,id FROM members WHERE not access='ADMIN'  ORDER BY access,nom DESC");
        } else if ($triOrdre == "decroissant" and $triRole == "non") {
            $requete = $connexion->prepare("SELECT nom,prenom,email,access,banned,id FROM members WHERE not access='ADMIN'  ORDER BY nom DESC");
        } else if ($triOrdre == "croissant" and $triRole == "oui") {
            $requete = $connexion->prepare("SELECT nom,prenom,email,access,banned,id FROM members WHERE not access='ADMIN'  ORDER BY access,nom ASC");
        } else {
            $requete = $connexion->prepare("SELECT nom,prenom,email,access,banned,id FROM members WHERE not access='ADMIN' ORDER BY nom ASC ");
        }
        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}

// fonction pour rechercher un pilote ou un manager
function getUserOrManager(String $typeSearch, String $item): array
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($typeSearch == "searchNom") {
            $requete = $connexion->prepare("SELECT prenom,nom,email,access FROM members WHERE  nom='$item' AND not access='ADMIN' ");
        } else {
            $requete = $connexion->prepare("SELECT prenom,nom,email,access FROM members WHERE  prenom='$item' AND not access='ADMIN' ");
        }
        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}
function getUserOrManager2(String $nom, String $prenom)
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $requete = $connexion->prepare("SELECT prenom,nom,email,access FROM members WHERE  nom='$nom' AND prenom='$prenom' AND not access='ADMIN' ");

        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}
function getUserByManager($id_manager, $ordre)
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($ordre == "decroissant") {
            $requete = $connexion->prepare("SELECT prenom,nom,email,access,id FROM members WHERE  id_manager='$id_manager' AND access='USER' ORDER BY nom DESC ");
        } else {
            $requete = $connexion->prepare("SELECT prenom,nom,email,access,id FROM members WHERE  id_manager='$id_manager' AND access='USER'ORDER BY nom ASC ");
        }

        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}

/**************
 FONCTION POUR AJAX
 *************/

function ajaxSearch(String $typeSearch, String $item): array
{
    try {
        $connexion = login_bdd();
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($typeSearch == "searchNom") {
            $requete = $connexion->prepare("SELECT prenom,nom FROM members WHERE  nom like '$item' AND not access='ADMIN' ");
        } else {
            $requete = $connexion->prepare("SELECT prenom,nom FROM members WHERE  prenom like '$item' AND not access='ADMIN' ");
        }
        $requete->execute();
        return $requete->fetchall();
    } catch (PDOException $e) {
        return null;
    }
}
