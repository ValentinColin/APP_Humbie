<?php
require_once("../../Model/ticket.php");
require_once("../../Controller/function.php");
session_start();
if_not_connected($redirection = "../View/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <link rel="stylesheet" type="text/css" href="../../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/home.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/ticket.css">

</head>

<body>
    <?php require("header.php"); ?>

    <main>

        <div id="box-nav" class="my-block">
            <?php require('nav.php') ?>
        </div>

        <form action="../../Controller/ticket.php" method="post">
            <H1>Send a ticket</H1>
            <select name="topic">
                <option value="login" selected>Login problem</option>
                <option value="test">Test problem</option>
                <option value="private_information">Private information</option>
            </select>
            <input type="text" name="title" placeholder="Nom de votre requête">
            <input type="text" name="content" placeholder="Ecrivez votre requête">
            <input type="submit" value="Envoyer" name="poster">
        </form>

        <?php
        $ticket = getTicketById($_SESSION['id'], '"in_process"');
        echo '<h1> Your tickets historic </h1>';
        echo '<h2> Your pending tickets </h2>';
        for ($i = 0; $i < count($ticket); $i++) {
        ?>
            <p>
                topic : <?= $ticket[$i]['topic'] ?> <br>
                subjet : <?= $ticket[$i]['subject'] ?> <br>
                Question from : <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?> <br>
                Request the : <?= $ticket[$i]['date_request'] ?> <br>
                Content: <br> <?= $ticket[$i]['msg_request'] ?>

            </p>

        <?php } ?>

        <?php
        $ticket = getTicketById($_SESSION['id'], '"validated"');
        echo '<h2> Your finished tickets </h2>';
        for ($i = 0; $i < count($ticket); $i++) {
        ?>
            <p>
                topic : <?= $ticket[$i]['topic'] ?> <br>
                subjet : <?= $ticket[$i]['subject'] ?> <br>
                Question de : <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?> <br>
                Request the : <?= $ticket[$i]['date_request'] ?> <br>
                Content: <br> <?= $ticket[$i]['msg_request'] ?> <br>
                Answer: <br> <?= $ticket[$i]['msg_reply'] ?>

            </p>

        <?php } ?>

        <?php require("footer.php"); ?>
</body>

</html>