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

        <?php
        $ticket = getTicket();
        echo  count($ticket) . ' Pending tickets: </h1> ';
        for ($i = 0; $i < count($ticket); $i++) {
        ?>
            <p>
                topic : <?= $ticket[$i]['topic'] ?> <br>
                subject : <?= $ticket[$i]['subject'] ?> <br>
                Question from : <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?> <br>
                request sent the : <?= $ticket[$i]['date_request'] ?> <br>
                Content: <br> <?= $ticket[$i]['msg_request'] ?>

                <form action="../../Controller/ticket.php" method="post">
                    <input type="text" name="reponse" placeholder="Contenu de la réponse" require>
                    <input type="submit" name=<?= sprintf('%d', $ticket[$i]['id_ticket']) ?> value="Poster">
                    <label for="mail">Notify by email</label>
                    <input type="checkbox" name="mail">
                </form>

            </p>

        <?php } ?>
        <?php require("footer.php"); ?>

</body>

</html>