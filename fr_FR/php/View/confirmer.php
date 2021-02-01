<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <link rel="stylesheet" href="../../../css/newPassword.css">

    <title>Document</title>
</head>
<body>

    <main>
    <form method="post" action="../Controller/newPassword.php">
        <fieldset >
            <legend>Réinitialisation de mot de passe</legend>
            <a class='backLoginPage' href='loginPage.php' title="Retouner à la page de connexion"> <<< </a>
            <p class="input">
            <?php
                if(isset($_SESSION['error']) && $_SESSION['error']){
            ?>
                <h3 id="error">Un champ a été mal renseigné </h3>
            <?php
            }
            ?>
                <br id='br'>
                Code reçu:  :  <input  id="mail" name="password" placeholder="code reçu"><br>
            </p>
            <hr>
            <input id='submit' type='submit' value='Valider'>
        </fieldset>
    
    </form>
    </main>
</body>
</html>

