<?php
session_start();
include('../../Controller/function.php');
verif_access('USER');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Humbie</title>
    <!-- <link rel="stylesheet" type="text/css" href="../../../../css/global.css"> -->
    <!-- Pour fixer le footer en bas de la page -->
    <link rel="stylesheet" type="text/css" href="../../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/header.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../../../css/home.css">
</head>

<body>
<?php require('header.php'); ?>
<?php require('nav.php'); ?>
<img src="../../../../Images/Remplissage_gauche.png" id="remplissage-gauche">

<main>
    <div>
        <label>Recevoir les résultats de test</label>
        <input value="recevoir" href="../../Controller/passerelle.php">
    </div>

    <div>
        <label>Envoyer des informations vers la carte</label>
        <input value="envoyer" href="../../Controller/passerelle-envoi.php">
    </div>

</main>

<!-- <aside id="blank"></aside> -->
<!-- Permet de bloquer le footer en bas de l'écran -->
<?php require('footer.php'); ?>
</body>
</html>