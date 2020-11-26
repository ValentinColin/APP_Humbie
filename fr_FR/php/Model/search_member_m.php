<?php

/*
Listes des fonctions :
function getNameLastNameMngOfUser(String $ordre=''):array--> ligne 14
function getNameLastNameManager(String $ordre=''):array  --> ligne 37
function getNameLastNameAllMembers(String $ordre=''):array --> ligne 60
function getUserOrManager(String $nom, String $prenom):array --> ligne 82

*/

//Recupère,nom prenom et id managers des utilisateurs et les classes
// par odre croissant ou decroissant, suivant le parametre
function getNameLastNameMngOfUser(String $ordre=''):array{
try{
        $connexion= new PDO("mysql:host=localhost;dbname=humbie","root","root");// connexion à la bdd
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// en cas d'erreur
        if($ordre=="decroissant"){ // si decroissant, classement par ordre decroissant
            $requete=$connexion->prepare("SELECT nom,prenom,id_manager FROM Members WHERE access='USER' ORDER BY nom DESC");
        }
        else{// sinonn, classement des utilisateur par ordre croissant
              $requete=$connexion->prepare("SELECT nom,prenom,id_manager FROM Members WHERE access='USER' ORDER BY nom ASC");

        }
        $requete->execute();// récupération des données
        return $resultat=$requete->fetchall();// tableau contenant les données récupérées

}
catch(PDOException $e){
    return null;
}
}

//Recupère,nom prenom managers  des et les classes
// par odre croissant ou decroissant, suivant le parametre.

function getNameLastNameManager(String $ordre=''):array{
    try{

            $connexion= new PDO("mysql:host=localhost;dbname=humbie","root","root");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if($ordre=="decroissant"){
                 $requete=$connexion->prepare("SELECT nom,prenom FROM Members WHERE access='MANAGER' ORDER BY nom DESC");
            }
            else{
                $requete=$connexion->prepare("SELECT nom,prenom FROM Members WHERE access='MANAGER' ORDER BY nom ASC");

            }
            $requete->execute();
            return $resultat=$requete->fetchall();
    }
    catch(PDOException $e){
       return null;
    }
    }


//Recupère,nom, prenom et roles des managers et admin et users,
// par odre croissant ou decroissant, suivant le parametre.
function getNameLastNameAllMembers(String $ordre=''):array{
        try{

                $connexion= new PDO("mysql:host=localhost;dbname=humbie","root","root");
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                if($ordre=="decroissant"){
                     $requete=$connexion->prepare("SELECT nom,prenom,access FROM Members WHERE not access='ADMIN'  ORDER BY nom DESC");
                }
                else{
                    $requete=$connexion->prepare("SELECT nom,prenom,access FROM Members WHERE not access='ADMIN' ORDER BY nom ASC");

                }
                $requete->execute();
                return $resultat=$requete->fetchall();

        }
        catch(PDOException $e){
           return null;
        }
     }

     // fonction pour rechercher un pilote ou un manager
     function getUserOrManager(String $nom, String $prenom):array{

        try{

            $connexion= new PDO("mysql:host=localhost;dbname=humbie","root","root");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $requete=$connexion->prepare("SELECT nom,prenom,access FROM Members WHERE  nom='$nom' AND prenom='$prenom' AND not access='ADMIN' ");
            $requete->execute();
            return $resultat=$requete->fetchall();

    }
    catch(PDOException $e){
       return null;
    }
 }

?>

