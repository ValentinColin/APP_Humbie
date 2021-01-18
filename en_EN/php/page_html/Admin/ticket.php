<?php
session_start();
include("../../Controller/ticket.php");
include("../../Model/ticket.php");
if_not_connected($redirection="../../View/login.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FAQ</title>
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
        echo '<h1> Il y a '.count($ticket).' pending tickets: </h1> ';
        $ticket = getTicket();
        for ($i=0; $i < count($ticket); $i++) { 
    ?>
            <p>
                topic : <?= $ticket[$i]['topic']?> <br>
                sujet : <?= $ticket[$i]['subject']?> <br>
                Question de : <?= $ticket[$i]['name']." ".$ticket[$i]['firstname']?> <br>
                réquête émise le : <?= $ticket[$i]['date_request'] ?> <br>
                Contenu: <br> <?= $ticket[$i]['msg_request']?>

                <form action="../../Controller/ticket.php" method="post">
                    <input type="text" name="reponse" placeholder="Content of the answer" require>
                    <input type="submit"  name= <?= sprintf('%d', $ticket[$i]['id_ticket']) ?> value="Post">
                </form>

            </p>
                    
    <?php } ?>
    
</body>
</html>