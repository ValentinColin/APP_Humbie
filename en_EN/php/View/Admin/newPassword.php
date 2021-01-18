<?php
session_start();
if ($_SESSION['connected']) {
    header('Location: home.php');
}
$erreur = null;
require_once('../../php_pur/login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Password reset </title>
    <link rel="stylesheet" href="../../../../css/loginPage.css">
    <link rel="stylesheet" href="../../../../css/newPassword.css">

</head>

<body>
    <center>
        <header>
            <h1>Reset page</h1>
            <!-- <img id="compagnyLogo"src="../Images/Infini_Measures.png" alt=""> -->
        </header>

        <main>
            <form method="post" action="password.php">
                <fieldset>
                    <legend>Reset password</legend>

                    <a class='backLoginPage' href='loginPage.php' title="Retouner à la page de connexion">
                        <<< </a> <p class="input">
                            <span id="errorDisplay">Incorrect Email </span>
                            <br id='br'>
                             Email adress : <input id="mail" type="mail" name="mail" placeholder="thisisan@exemple.fr" required><br>
                            </p>
                            <hr>
                            <input id='submit' type='submit' value='Submit'>
                </fieldset>
            </form>
        </main>
    </center>


</body>
<script src="../../../js/newPassword.js"></script>

</html>