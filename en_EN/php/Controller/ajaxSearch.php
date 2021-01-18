<?php
session_start();
require_once '../Model/search_member_m.php';
require_once 'function.php';
if_not_connected($redirection = "../View/login.php");


//***********AJAXXXX */

$ajaxTypeRecherche=exist_data('ajax_type_search',true);
$ajaxElement=exist_data('content',true);
$ajaxElement=$ajaxElement.'%';
$resultat=ajaxSearch($ajaxTypeRecherche,$ajaxElement);


//echo print_r($resultat);
echo json_encode($resultat);


?>