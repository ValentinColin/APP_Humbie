<!doctype html>
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

    <fieldset method="post" action="login2.php">
        <legend>Connexion</legend>

    	<a id="retour"> << </a>

        <div>
            <h2>
                Connexion Admin :
            </h2>

            <p class="Input admin">
                Identifiant :  <input id="adminMail" type="mail"     name="Pseudo"   value="" placeholder="adresse mail"><br> <br>
                Mot de passe : <input id="adminPwd"  type="password" name="Password" value="" placeholder="mot de passe">
            </p>
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

        <p class="valider">
            <input type="submit" value="valider">
        </p>
    </fieldset>

</main>
<footer>
    <!-- Pied de page -->
</footer>
</body>

<script src="../javascript/login.js">

</script>



</html>
