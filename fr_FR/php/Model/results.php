<?php 
include_once("login_bdd.php");
// importez Controller/function.php dans votre view
session_start(); 

//Cherche les résultats disponibles des tests effectués par un user
function results($id){
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_session`, `id_type`, `date`, `result` 
                        FROM `test_board` 
                        WHERE `id_user` = '.$id.' ORDER BY  `date` DESC' );
    $datas = $req->fetchAll();
    $req->closeCursor();
    return $datas;
}

//Trie les résutats d'un user en fonction de id_session
function trier($datas){
    $table = [];
    $index = [];
    foreach($datas as $value)
    {   
        if (in_array($value['id_session'], $index)){
            $indice = array_search($value['id_session'],$index);
            $json = json_decode($value['result'], true);
            $table[$indice][] = $json['result'];

        }
        else{
            $index[] = $value['id_session'];
            $indice = array_search($value['id_session'],$index);
            $json = json_decode($value['result'], true);
            $table[$indice][] = [$json['date'],$json['centre-examen']];

            $table[$indice][] = $json['result'];
        }
        
    }
    return $table;
}


?>