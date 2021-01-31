<?php
/* *********** *
 * View: login *
 * *********** */
session_start();
include("../Controller/function.php");

if (isset($_SESSION['connected'])) {
    if ($_SESSION['connected'] and !$_SESSION['banned']) {
        go('home.php');
    }
} else {
    $_SESSION['connected'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Authentication page</title>
    <link rel="stylesheet" type="text/css" href="../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../css/loginPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <center>

    <a id='pasDeCompte' href='mailto:service.humbie@gmail.com' title="Envoyer un mail à service.humbie@gmail.com"> Some questions ? Contact the admin </a>

        <main>
            <?php if (isset($_GET['connexion']) and $_GET['connexion'] == 'non') : ?>
                <p id='tryAgain'>Incorrect e-mail address or password.</p>
            <?php endif ?>
            <?php if (isset($_GET['banned']) and $_GET['banned'] == true) : ?>
                <p id='banned'>You have been banned from the website.</p>
            <?php endif ?>
            <form method="post" action="../Controller/login.php">
                <fieldset>
                    <legend>Connection</legend>
                    <p class="input">
                        <span id="errorDisplay">Adresse mail not valid</span><br id='br'>
                        <input id="input_mail" type="mail" name="mail" <?php if (isset($_COOKIE['mail'])) : ?> value=<?= $_COOKIE['mail'];
                                                                                                                endif; ?> placeholder="Adresse mail" required>
                        <input id="input_pass" type="password" name="password" placeholder="Mot de passe" required>
                        <hr>
                        <input id='submit' type='submit' value='Se connecter'> <br> <br>

                        <a id='newPassword' href='newPassword.php'> Mot de passe oublié </a>
                    </p>
                </fieldset>
            </form>
        </main>
    </center>
</body>
<script src="../../js/loginPage.js"> </script>

</html>