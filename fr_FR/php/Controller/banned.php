<?php
session_start();

require_once '../Model/banned.php';
require_once 'function.php';

if_not_connected($redirection = "../View/login.php");

$id=exist_data('id',false);
$etat=exist_data('etat',false);

banned($id,$etat);

header('location: ../search_member_c.php/?search=AllMember');
exit;

?>