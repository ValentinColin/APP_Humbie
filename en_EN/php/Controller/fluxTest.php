<?php 
session_start();
require_once 'function.php';
require_once '../Model/results.php';

$nbr = exist_data("nbr",false);
$graph = exist_data("graph",false);

if (!$nbr){
    $nbr = 60;
}else{
    $nbr = $nbr*6;
}
$id = $_SESSION['id'];
$resultat = trier(resultsByManager($id,$nbr));
$_SESSION['resultat_test'] = $resultat;
if($graph){
    foreach($resultat as $elements){
        $n = 1;
        while($n <=4){
            if($n==1){
                createImage($elements[$n],$elements[0][4]+$n-1,$n,'temps','BPM',60);
            }
            if($n==2){
                createImage($elements[$n],$elements[0][4]+$n-1,$n,'temps','C',37);
            }
            if($n == 3){
                $tables = array_merge($elements[$n]['acute'], $elements[$n]['low']) ;
                createImage($tables,$elements[0][4]+$n-1,$n,'temps','Hz');
            }
            else{
                createImage($elements[$n],$elements[0][4]+$n-1,$n,'temps','ms',200);
            }
            $n += 1;
        }
    }
    goView('fluxTestGraph.php');
}

goView('fluxTest.php');
?>