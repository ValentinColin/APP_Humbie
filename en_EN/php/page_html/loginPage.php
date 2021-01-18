<?php
session_start();

if (isset($_SESSION['connected'])){
    if($_SESSION['connected']){
        header('Location: home.php');
        exit;
    }
} else {
    $_SESSION['connected'] = false;
};
$erreur = null;
require_once('../php_pur/login.php');
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Authentification page</title>
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

</head>

<body>
    <center>
        <header>
            <h1>Do I know you ?</h1>
            <!-- <img id="compagnyLogo" src="../Images/Infini_Measures.png" alt=""> -->
        </header>
        <main>
            <?php if (isset($_GET['connection']) && $_GET['connection']=='no') :?>
            <p id ='tryAgain'> Email or password incorrect.</p>
            <?php endif ?>
            <form method="post" action="">
                <fieldset >
                    <legend>Connection</legend>

                    <p class="input">
                        <span id="errorDisplay"> Invalid email adress</span> <br id='br'>
                        <input id="input_mail" type="mail"  name="mail" <?php if (isset($_COOKIE['mail'])):?> value= <?php echo $_COOKIE['mail']; endif; ?> placeholder="ceci-est-un@exemple.fr" required> <br> <br>
                        <input id="input_pass" type="password" name="password" placeholder="mot de passe" required>
                    </p>
                    <hr>

                    <p id='confirm'> <input id='submit' type='submit' value='Log in'>



                </fieldset>
            </form>
        </main>
    </center>
</body>
<script src="../../js/loginPage.js"> </script>

</html>
