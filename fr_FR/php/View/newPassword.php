<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../../css/config.css">
    <link rel="stylesheet" type="text/css" href="../../../css/loginPage.css">

</head>
<body>

    <h1>Réinitialisation de mot de passe.</h1>

    <h2>Indiquez votre nouveau mot de passe. </h2>
    <form action="../Controller/newPassword.php" method="POST">
        <input type="password" placeholder="nouveau mot de passe" name="newpassword">
        <input type="password" placeholder="nouveau mot de passe" name="repeatpassword">
        <input type="submit" value="changer de mot de passe">
    </form>
    
</body>
</html>