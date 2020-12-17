<?php
require_once("../../Model/ticket.php");
require_once("../../Controller/function.php");
session_start();
if_not_connected($redirection="../View/login.php");
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
    <select name="topic">
        <option value="login" selected>Problème login</option> 
        <option value="test" >Problème test</option>
        <option value="private_information">Information privée</option>
    </select>
    <input type="text" name="title" placeholder="Nom de votre requête">
    <input type="text" name="content" placeholder="Ecrivez votre requête">
    <input type="submit" value="Envoyer" name="poster">
    </form>
    <?php require("footer.php"); ?>
</body>
</html>