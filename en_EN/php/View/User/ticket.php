<?php
require_once("../../Model/ticket.php");
require_once("../../Controller/function.php");
session_start();
verif_access('USER');
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
    <link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/tickets.css">


</head>

<body>
    <?php require("header.php"); ?>

    <div id="box-nav" class="my-block">
            <?php require('nav.php') ?>
        </div>

    <img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

    <main>

        <form action="../../Controller/ticket.php" method="post">
            <H1>Envoyer un ticket</H1>
        <div id="pbm">
        <select id="topic" name="topic">
                <option value="login" selected>Problème login</option>
                <option value="test">Problème test</option>
                <option value="private_information">Information privée</option>
            </select>
            <input type="text" name="title" placeholder="Name of your request">
        </div>
            <br>
            <textarea  name="content" placeholder="Write here"   rows='4' cols= '10' minlength="5" maxlength="400" wrap='hard' >
            </textarea>
            <br>
            <input id="submit" type="submit" value="Submit" name="poster">
        </form>


        <div id="historique">

        <h1> Your ticket history </h1>

        <h2> Your pending tickets </h2>
        <table id='tableRep2'>
            <tr>
            <th> Topic </th>
            <th> Subjet </th>
            <th> Question from  </th>
            <th> Date </th>
            <th> Content </th>
            </tr>
            <?php
        $ticket = getTicketById($_SESSION['id'], '"in_process"');
        for ($i = 0; $i < count($ticket); $i++) {
        ?>
            <tr>
              <td>  <?= $ticket[$i]['topic'] ?> </td>
              <td>  <?= $ticket[$i]['subject'] ?> </td>
              <td>  <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?> </td>
              <td>  <?= $ticket[$i]['date_request'] ?> </td>
              <td>   <?= $ticket[$i]['msg_request'] ?> </td>
            </tr>

        <?php } ?>
        </table>


        <h2> Your completed tickets </h2>
        <table id='tableRep'>
            <tr>
            <th> Topic </th>
            <th> Subjet </th>
            <th> Question from  </th>
            <th> Date  </th>
            <th> Content </th>
            <th> Answer</th>
            </tr>
        <?php
        $ticket = getTicketById($_SESSION['id'], '"validated"');
        for ($i = 0; $i < count($ticket); $i++) {
        ?>      <tr>
               <td> <?= $ticket[$i]['topic'] ?></td>
               <td> <?= $ticket[$i]['subject'] ?></td>
               <td> <?= $ticket[$i]['name'] . " " . $ticket[$i]['firstname'] ?></td>
               <td> <?= $ticket[$i]['date_request'] ?></td>
               <td> <?= $ticket[$i]['msg_request'] ?></td>
               <td> <?= $ticket[$i]['msg_reply'] ?></td>
                </tr>
        <?php } ?>
        </table>
    </div>
    </main>
    <?php require("footer.php"); ?>
</body>

</html>