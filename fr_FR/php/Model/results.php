<?php 
include_once("login_bdd.php");
// importez Controller/function.php dans votre view
session_start(); 

ini_set('display_errors', '1');
ini_set('extension', 'gd2');

gd_info();


//Cherche les résultats disponibles des tests effectués par tous les users associé à un manager
function resultsByManager($id,$nbr =50){
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_session`, `id_type`, `date`, `nom`, `prenom`,`id_test`,city,id
                        FROM `test_board` JOIN `members` ON test_board.id_user = members.id
                        WHERE `id_manager` = '.$id.' ORDER BY  `date` DESC LIMIT '.$nbr );
    $datas = $req->fetchAll();
    $req->closeCursor();
    $i = 0;
    foreach($datas as $element)
    {
        $req = $bdd->query('SELECT  `result`
                        FROM `results` 
                        WHERE `id_test` = '.$element['id_test']);
        $array_results = $req->fetchAll();
        $table_results = [];
        foreach($array_results as $results)
        {
            $table_results[] = $results[0];
        }
        $datas[$i]['results'] = $table_results;
        $i +=1;
    }

    
    return $datas;
}


//Cherche les résultats disponibles des tests effectués par un user
function results($id,$nbr =50){
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_session`, `id_type`, `date`, `nom`, `prenom`,`id_test`,id,city
                        FROM `test_board` JOIN `members` ON test_board.id_user = members.id
                        WHERE `id` = '.$id.' ORDER BY  `date` DESC LIMIT '.$nbr );
    $datas = $req->fetchAll();
    $req->closeCursor();
    $i = 0;
    foreach($datas as $element)
    {
        $req = $bdd->query('SELECT  `result`
                        FROM `results` 
                        WHERE `id_test` = '.$element['id_test']);
        $array_results = $req->fetchAll();
        $table_results = [];
        foreach($array_results as $results)
        {
            $table_results[] = $results[0];
        }
        $datas[$i]['results'] = $table_results;
        $i +=1;
    }
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
            $table[$indice][] = $value['results'];

        }
        else{
            $index[] = $value['id_session'];
            $indice = array_search($value['id_session'],$index);
            if(isset($value['nom']) && isset($value['prenom'])){
                $table[$indice][] = [$value['date'],$value['city'],$value['nom'],$value['prenom'],$value['id_test'],$value['id']];
            }else{
                $table[$indice][] = [$value['date'],$value['city']];
            }
            $table[$indice][] = $value['results'];
        }
        
    }
    print_r($table);
    return $table;
}

/**
 * Cette fonction crée et renvoie le chemin du graphique générer.
 */
function createImage(array $array,$id,$id_type,$uniteX = 'temps',$uniteY = 'valeur',$origine =0){
    if(file_exists("../../../Images/Resultats/test"."$id"."_"."$id_type".".png")){
        return "../../../Images/Resultats/test"."$id"."_"."$id_type".".png";
    }
    else{
        //taille image
        $width = 600;
        $height = 600; 

        //emplacement v max
        $xmax  = $width - 50;
        $ymax = 50;

        //taille d'une unité
        $ligneHeight = 5;

        //création d'image
        $image = imagecreate($width,$height);

        //rayon des points
        $circleWidth = 6;

        $min = min($array);

        //Les couleurs
        $beige = imagecolorallocatealpha($image, 222, 222, 222,127);
        $vert = imagecolorallocate($image, 15, 232, 186);
        $gris = imagecolorallocate($image, 70, 70, 70);

        if($min<$origine){
            imageline($image, $width - 30,$height/2,30,$height/2, $gris);
        }
        else{
            imageline($image, $width - 30,$height - 30,30,$height - 30, $gris);
        }
        imageline($image, 30,30,30, $height - 30, $gris);

        //pour faire des flêches x
        if($min<$origine){

            imageline($image, $width - 40,$height/2 -10,$width - 30,$height/2, $gris);
            imageline($image, $width - 40,$height/2 +10,$width - 30,$height/2, $gris);
            imagestring($image, 2, $width-35, $height/2 +10, $uniteX, $gris);
        }
        else{
            imageline($image, $width - 40,$height - 20,$width - 30,$height - 30, $gris);
            imageline($image, $width - 40,$height - 40,$width - 30,$height - 30, $gris);
            imagestring($image, 2, $width-35, $height-20, $uniteX, $gris);
        }


        //pour faire des flêches y
        imageline($image, 30 - 10,30 +10,30, 30, $gris);
        imageline($image, 30 + 10,30 +10,30,30, $gris);
        imagestring($image, 2, 20, 15, $uniteY, $gris);

        //origine
        if($min<$origine){
            imagestring($image, 2, 5, $height/2, $origine, $gris);

        }
        else{
            imagestring($image, 2, 5, 270, $origine, $gris);
        }


        $total = count($array)-1;
        $max = max($array);
        $i = 0;
        $temp = 0;
        foreach($array as $element){

            if($min<$origine){
                if(abs($min-$origine) >= abs($max-$origine)){
                    $max = abs($min);
                }
                imageline($image, 30 + (($xmax -30) * $i)/$total, $height/2 + $ligneHeight,30 + (($xmax -30) * $i)/$total,$height/2 - $ligneHeight,$gris);
                imageline($image, 30 +$ligneHeight,$height/2 -($height/2 - $ymax)*($element - $origine)/(abs($max-$origine)),30 - $ligneHeight,$height/2 -($height/2 - $ymax)*($element - $origine)/(abs($max-$origine)),$gris);
                imagefilledellipse ($image , 30 + (($xmax -30) * $i)/$total ,$height/2 -($height/2 - $ymax)*($element - $origine)/(abs($max-$origine)), $circleWidth , $circleWidth , $vert ); 
            }
            else{
                imageline($image, 30 + (($xmax -30) * $i)/$total, $height - 30 + $ligneHeight,30 + (($xmax -30) * $i)/$total,$height - 30 - $ligneHeight,$gris);
                imageline($image, 30 +$ligneHeight, $height -$ymax -($height-2*$ymax)*($element - $origine)/(abs($max-$origine)),30 - $ligneHeight,$height -$ymax -($height-2*$ymax)*($element - $origine)/(abs($max-$origine)),$gris);
                imagefilledellipse ($image , 30 + (($xmax -30) * $i)/$total ,$height -50 -($height-2*$ymax)*($element - $origine)/(abs($max-$origine)), $circleWidth , $circleWidth , $vert ); 
            }

            if($element != $origine){
                if($min < $origine){
                    imagestring($image, 2, 5,$height/2 -($height/2 - $ymax)*($element - $origine)/(abs($max-$origine)), "$element", $gris);
                }
                else{
                    imagestring($image, 2, 5,$height -$ymax -($height-2*$ymax)*($element - $origine)/(abs($max-$origine)), "$element", $gris);
                }
            }
            $i +=1;
            $temp = $element;
        }
        imagepng($image, "../../../Images/Resultats/test"."$id"."_"."$id_type".".png");
        return "../../../Images/Resultats/test"."$id"."_"."$id_type".".png";
    }

}
