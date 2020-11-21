<?php 
/* *********** *
 * View: login *
 * *********** */
include("../Controller/function.php")


?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
    <title>Page d'authentification</title>
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
</head>
<body>
	<center>
        <header>
            <h1>Page d'authentification</h1>
        </header>
        <main>
            <?php if (isset($_GET['connexion']) and $_GET['connexion']=='non') :?>
            	<p id='tryAgain'>Adresse mail ou mot de passe incorrecte.</p>
            <?php endif ?>
            <form method="post" action="../Controller/login.php">
                <fieldset >
                    <legend>Connexion</legend>

                    <p class="input">
                        <span id="errorDisplay"> Adresse mail non valide</span><br id='br'>
                        Adresse mail :<input id="input_mail" type="mail"  name="mail" placeholder="ceci-est-un@exemple.com" required><br><br>

                        Mot de passe :<input id="input_pass" type="password" name="password" placeholder="mot de passe" required>
                    </p>
                    <hr>

                    <input id='submit' type='submit' value='Se connecter'>

                  	<!-- Bouton lovinsky -->

                </fieldset>
            </form>
        </main>
    </center>
</body>
<script src="../../js/loginPage.js"> </script>

</html>