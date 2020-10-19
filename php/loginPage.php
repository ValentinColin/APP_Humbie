<?php
session_start();

if ( isset($_SESSION['connected'])){
    if($_SESSION['connected']){
        header('Location: main.php');
    }
} else {
    $a=7;
};
$erreur = null;
require_once('login.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title> Page d'authentification</title>
    <link rel="stylesheet" href="../css/loginPage.css">

</head>

<body>
    <center>
        <header>
            <h1> Page d'authentification</h1>
        </header>

        <main>
            
            <p id ='tryAgain'> Adresse mail ou  mot de passe incorrecte. <p>
            <form method="post" action="">
                <fieldset >
                    <legend>Connexion</legend>


                    <p class="input">
                        Identifiant :  <input id="mail" type="mail" name="pseudo"  placeholder="adresse mail"><br> <br>
                        Mot de passe : <input id="adminPwd"  type="password" name="password" placeholder="mot de passe"><br>
                    </p>
                    <hr>
                    <p id='confirm'> <input id='submit'type='submit' value='Se connecter'>
                    <a id='newPsw' href='newPassword.php'> Mot de passe oublié </a>
                    </p>

                </fieldset>
            </form>

    </main>
</center>

</body>
<script src="../js/loginPage.js"> </script>

</html>

