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
    <title> Maquette site web page d'accueil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<header>
    <!-- En-tête -->
    <h1> Page d'authentification</h1>
</header>
<main>
 

    <fieldset >
        <legend>Connexion</legend>

    	<a id="retour"> << </a>

        <div>
            <h2>
                Connexion Admin :
            </h2>
            <form method="post" action="maquette.php">
                <p class="Input admin">
                    Identifiant :  <input id="adminMail" type="mail"     name="pseudo"   value="" placeholder="adresse mail"><br> <br>
                    Mot de passe : <input id="adminPwd"  type="password" name="password" value="" placeholder="mot de passe"><br>
                    <input type="submit" value="valider">
                </p>
            </form>
        </div>

        <hr>

        <div>
            <h2>
                Connexion Manager :
            </h2>

            <p class="Input manager">
                Identifiant :  <input id="managerMail" type="mail"     name="Pseudo"   value="" placeholder="adresse mail"><br> <br>
                Mot de passe : <input id="managerPwd"  type="password" name="Password" value="" placeholder="mot de passe">
            </p>
        </div>

        <hr>

        <div>
            <h2>
                Connexion Membre :
            </h2>

            <p class="Input user">
                Identifiant :  <input id="userMail" type="mail"     name="Pseudo"   value="" placeholder="adresse mail"> <br> <br>
                Mot de passe : <input id="userPwd"  type="password" name="Password" value="" placeholder="mot de passe">
            </p>
        </div>
        <!-- <form method="post" action="maquette.php">
            <p class="valider">
                <input type="submit" value="valider">
            </p>  
        </form> -->
    </fieldset>

</main>
<footer>
    <!-- Pied de page -->
</footer>
</body>

<script src="../javascript/login.js">

</script>



</html>
