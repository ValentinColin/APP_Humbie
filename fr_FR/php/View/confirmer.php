<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../css/loginPage.css">
    <title>Humbie</title>
</head>
<body>

    <a href="login.php">Retourner à la page de login.</a>
    <h1>Réinitialisation de mot de passe.</h1>


    <?php
    if(isset($_SESSION['error']) && $_SESSION['error']){
    ?>
        <h3 id="error">Un champ a été mal renseigné </h3>
    <?php
    }
    ?>

    <h2>Indiquez le mail de votre compte. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="email" placeholder="e-mail de réninitialisation" name="email">
        <input type="submit" value="envoyer un code de vérification">
    </form>

    <h2>Un mot de passe vous a été envoyé par mail. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="text" placeholder="code de vérification" name="password">
        <input type="submit" value="envoyer un code de vérification">
    </form>

</body>
</html>