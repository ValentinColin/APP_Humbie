<?php
session_start();
if ($_SESSION['connected']){
    header('Location: main.php');
}
$erreur = null;
require_once('login.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Réinitialisation de mot de passe </title>
    <link rel="stylesheet" href="../css/loginPage.css">
    <link rel="stylesheet" href="../css/newPassword.css">

</head>

<body>
    <center>
        <header>
        <!---->
        </header>

        <main>

            <form method="post" action="password.php">
                <fieldset >
                    <legend>Réinitialisation de mot de passe</legend>

                    <a class='backLoginPage' href='loginPage.php'> <<< </a>
                    <p class="input">
                    <span id="errorDisplay"> Adresse mail incorrecte </span>
                        <br id='br'>
                        Adresse mail  :  <input id="mail" type="mail" name="mail"  placeholder="cest-un@exemple.fr" required><br>


                    </p>
                    <hr>
                     <input id='submit' type='submit' value='Réinitialiser'>



                </fieldset>
            </form>

    </main>
</center>


</body>
<script src="../js/newPassword.js"></script>

</html>
