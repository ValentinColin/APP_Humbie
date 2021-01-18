<?php
include("../Controller/function.php");
include("../Model/ticket.php");
session_start();
if_not_connected($redirection="../View/login.php");

if (isset($_POST['poster'])){
    ticketPost($_POST['topic'],$_POST['title'],$_SESSION['id'],$_POST['content']);
}
else{
    ticketReply($_SESSION['id'],$_POST['reponse'],$_POST);
}
go('ticket.php');
?>

