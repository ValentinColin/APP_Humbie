<?php
/* *********** *
 * View: login *
 * *********** */
session_start();
include("../Controller/function.php");

if (isset($_SESSION['connected'])) {
    if ($_SESSION['connected']) {
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
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../css/loginPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<body>
    <center>
        <header>
            <h1>Login Page</h1>
        </header>
        <main>
            <?php if (isset($_GET['connexion']) and $_GET['connexion'] == 'non') : ?>
                <p id='tryAgain'>Mail adress or incorrect password.</p>
            <?php endif ?>
            <form method="post" action="../Controller/login.php">
                <fieldset>
                    <legend>Connection</legend>
                    <p class="input">
                        <span id="errorDisplay">Invalid mail adress mail</span><br id='br'>
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