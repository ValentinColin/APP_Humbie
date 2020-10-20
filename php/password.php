<?php 
session_start();
include('function.php');

if (isset($_POST['mail'])){
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->query("SELECT COUNT(*) FROM members WHERE email = '".$_POST['mail']."'");
    $instantanceNumber = $req ->fetch();

    if($instantanceNumber['0'] >=1 ){
        $_SESSION['mail'] = $_POST['mail'];
    }else{
        header('Location: newPassword.php');
    }
}else{
    header('Location: newPassword.php');  
}

$_SESSION['motdepasse'] = passwordgen(7);
$message = 'Voici le code secret : ' . $_SESSION['motdepasse'];
$mail = mail($_POST['mail'], 'Réinitialisation du mot de passe', $_SESSION['motdepasse']);

if($mail){
    echo 'Le mail a bien été envoyé';
}else{
    echo 'Erreur ';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="changePassword.php">
        <a> <p class='input'> code reçu: <input name="code" placeholder="code reçu"> <br></p> </a>
        <hr>
        <input type='submit' value='Valider'>
    </form>
</body>
</html>

 