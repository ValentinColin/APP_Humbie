<?php
session_start();
if ($_SESSION['connected']) {
    header('Location: home.php');
}
$erreur = null;
require_once('../php_pur/login.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Reset password </title>
    <link rel="stylesheet" href="../../../css/newPassword.css">
    <link rel="stylesheet" href="../../../css/loginPage.css">

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
                    <legend>Resest password page</legend>

                    <a class='backLoginPage' href='login.php' title="Retouner à la page de connexion">
                        <<< </a> <p class="input">
                            <span id="errorDisplay"> Wrong mail adress </span>
                            <br id='br'>
                            <input id="mail" type="mail" name="mail" placeholder="Mail adress" required><br>
                            </p>
                            <hr>
                            <input id='submit' type='submit' value='Réinitialiser'>
                </fieldset>
            </form>
        </main>
    </center>


</body>
<script src="../../js/newPassword.js"></script>

</html>