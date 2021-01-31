<?php
session_start();
require_once('../Controller/mail.php')
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Humbie</title>
</head>
<body>
    <?php
    if(isset($_SESSION['error']) && $_SESSION['error']){
    ?>
        <h2>Un champ a été mal renseigné </h2>
    
    <?php
    }
    if(!isset($_SESSION['reinitialisation'])){
    ?>
    <h2>Indiquez le mail de votre compte. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="email" placeholder="e-mail de réninitialisation" name="email">
        <input type="submit" value="envoyer un code de vérification">
    </form>

    <?php
    if(isset($_SESSION['reinitialisationPassword'])){
    ?>
    <h2>Un mot de passe vous a été envoyé par mail. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="text" placeholder="code de vérification" name="password">
        <input type="submit" value="envoyer un code de vérification">
    </form>
    <?php
    }}
    if(isset($_SESSION['reinitialisation']) && $_SESSION['reinitialisation']){
    ?>

    <h2>Indiquez votre nouveau mot de passe. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="text" placeholder="nouveau mot de passe" name="newpassword">
        <input type="text" placeholder="nouveau mot de passe" name="repeatpassword">
        <input type="submit" value="envoyer un code de vérification">
    </form>

    <?php
    }
    ?>
</body>
</html>

