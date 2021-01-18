<?php
include_once("../Model/ticket.php");
include_once("../Controller/function.php");
session_start();
if_not_connected($redirection = "../View/login.php");

if (isset($_POST['poster'])) {
    ticketPost($_POST['topic'], $_POST['title'], $_SESSION['id'], $_POST['content']);
} elseif (isset($_POST['reponse'])) {
    ticketReply($_SESSION['id'], $_POST['reponse'], $_POST);
    if (isset($_POST['mail'])) {
        sendTicketByMail($_POST);
    }
}

goView('ticket.php');
