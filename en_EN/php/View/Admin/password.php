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
    $message = 'Here is the secret code : ' . $_SESSION['motdepasse'];
    $mail = mail($_SESSION['mail'], 'Reset password', $_SESSION['motdepasse']);
    if ($mail) {
        echo 'The email has been sent';
    } else {
        echo 'Error ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset password</title>
</head>

<body>
    <form method="post" action="changePassword.php">
        <a>
            <p class='input'> code received: <input name="code" placeholder="code received"> <br></p>
        </a>
        <hr>
        <input type='submit' value='Submit'>
    </form>

    <form method="post" action="password.php">
        <input type='submit' name='resend' Value='Submit Again'>
    </form>
</body>

</html>