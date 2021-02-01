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
$_SESSION['ticket'] = getTicket();
$_SESSION['ticket_in_progress'] = getTicketById($_SESSION['id'], '"in_process"');
$_SESSION['ticket_validated'] = getTicketById($_SESSION['id'], '"validated"');
goView('ticket.php');
