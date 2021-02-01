<?php
session_start();
require_once("../../Controller/function.php");
verif_access('ADMIN');
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
	<link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/tickets.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/ticket_admin.css">
</head>

<body>
    <?php require("header.php"); ?>

    <div id="box-nav" class="my-block">
            <?php require('nav.php') ?>
    </div>
    <img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

    <main>
        <div id= "tiket-en-attente">
        <?php
        $ticket = $_SESSION['ticket'];
        echo '<h1> Il y a ' . count($ticket) . ' tickets en attente: </h1> ';
        for ($i = 0; $i < count($ticket); $i++):
        ?>
        <div id='ticket'>
            <table>
                <tr>
                    <td> <span> topic :</span> <?= $ticket[$i]['topic'] ?>  </td>
                    <td> <span> subjet :</span> <?= $ticket[$i]['subject'] ?> </td>
                    <td> <span> Question from :</span> <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?> </td>
                    <td> <span> request on :</span> <?= $ticket[$i]['date_request'] ?> </td>
                </tr>
            </table>
            <div class="question">
                 <span> Content:</span>  <?= $ticket[$i]['msg_request'] ?>
            </div>
            <div class="rep">
                <form action="../../Controller/ticket.php" method="post">
                    <textarea class="input_Reponse" type="text" name="reponse" placeholder="content of the answer" require> </textarea>
                    <input class='submit' type="submit" name=<?= sprintf('%d', $ticket[$i]['id_ticket']) ?> value="Poster">
                    <label for="mail">Notify by email</label>
                    <input type="checkbox" name="mail">
                </form>
            </div>
        </div> <br> <br>
        <?php endfor; ?>
        </div>

    </main>

    <?php require("footer.php"); ?>
    
</body>
</html>