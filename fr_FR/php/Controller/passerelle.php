<?php
session_start();
require_once ('../Model/results.php');


function getData($teamNumber)
{
    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService/?ACTION=GETLOG&TEAM=" . $teamNumber);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function fetchData(){
//la variable $data contient les données brutes, sous forme d’une longue chaîne de caractères.
    define('TEAM_NUMBER', 'A11D');

    $data_tab = str_split(getData(TEAM_NUMBER),33);
    echo "Tabular Data:<br />";
    for($i=(count($data_tab) -1); $i<(count($data_tab) - 7); $i--){
        echo "Trame $i: $data_tab[$i]<br />";
    }

    $j = count($data_tab) -7;
    $i = 0;
    $trame = $data_tab[$j];

// décodage avec des substring
    $t = substr($trame,0,1);
    $o = substr($trame,1,4);

// décodage avec sscanf
    list($t, $o, $r, $capteur, $n, $value, $a, $x, $year, $month, $day, $hour, $min, $sec) =
        sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

    echo("<br />");
    echo("$t,$o,$r,$capteur,$n,$value,$a,$x,$year,$month,$day,$hour,$min,$sec");
    echo("<br />");

    $result = [];
    for ($k = $j; $k < count($data_tab); $k++){
        list($t, $o, $r, $capteur, $n, $value, $a, $x, $year, $month, $day, $hour, $min, $sec) =
            sscanf($data_tab[$k],"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        array_push($result, hexdec($value));
    }
    $json = json_encode($result);
    newResults($_SESSION['id'], $json, 3);
}

function sendData(){
    define('TEAM_NUMBER', 'A11D');

    $trame = "1A11D13010001b7";

    $ch = curl_init();
    curl_setopt(
        $ch,
        CURLOPT_URL,
        "http://projets-tomcat.isep.fr:8080/appService/?ACTION=COMMAND&TEAM=" . TEAM_NUMBER."&TRAME=" . $trame);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $data = curl_exec($ch);
    echo $data;
    curl_close($ch);
}

