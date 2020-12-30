<?php
session_start();
include('../../php_pur/function.php');

if (isset($_POST['mail'])) {
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->query("SELECT COUNT(*) FROM members WHERE email = '" . $_POST['mail'] . "'");
    $instantanceNumber = $req->fetch();

    if ($instantanceNumber['0'] >= 1) {
        $_SESSION['mail'] = $_POST['mail'];
    } else {
        header('Location: newPassword.php');
        exit;
    }
} elseif (!$_SESSION['mail']) {
    header('Location: newPassword.php');
    exit;
}

if (!isset($_SESSION['motdepasse']) || isset($_POST['resend'])) {
    $_SESSION['motdepasse'] = passwordgen(7);
    $message = 'Voici le code secret : ' . $_SESSION['motdepasse'];
    $mail = mail($_SESSION['mail'], 'Réinitialisation du mot de passe', $_SESSION['motdepasse']);
    if ($mail) {
        echo 'Le mail a bien été envoyé';
    } else {
        echo 'Erreur ';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
</head>

<body>
    <form method="post" action="changePassword.php">
        <a>
            <p class='input'> code reçu: <input name="code" placeholder="code reçu"> <br></p>
        </a>
        <hr>
        <input type='submit' value='Valider'>
    </form>

    <form method="post" action="password.php">
        <input type='submit' name='resend' Value='Renvoyer'>
    </form>
</body>

</html>