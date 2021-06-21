<?php
session_start();
require_once ('../Model/results.php');

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

sendData();
header('Location: ../View/User/integration.php');
