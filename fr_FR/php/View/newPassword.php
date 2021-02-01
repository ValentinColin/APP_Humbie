<?php
if(!(isset($_SESSION['access']) && isset($_SESSION['mail']) &&$_SESSION['access'] = $_SESSION['mail'])){
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/loginPage.css">
    <link rel="stylesheet" href="../../../css/newPassword.css">

</head>
<body>
    <main>
        <form method="post" action="../Controller/newPassword.php">
            <fieldset >
                <legend>Indiquez votre nouveau mot de passe.</legend>

                <a class='backLoginPage' href='loginPage.php' title="Retouner à la page de connexion"> <<< </a>
                <p class="input">
                <span id="errorDisplay"> Adresse mail incorrecte </span>
                    <br id='br'>
                    Mot de passe:  <input id='mail' type="password" placeholder="nouveau mot de passe" name="newpassword"><br>
                    <br id='br'>
                      <input id='mail'  type="password" placeholder="répetez votre mot de passe" name="repeatpassword"><br>
                </p>
                <hr>
                <input id='submit' type="submit" value="changer de mot de passe">
            </fieldset>
        </form>
    </main> 
</body>
</html>

