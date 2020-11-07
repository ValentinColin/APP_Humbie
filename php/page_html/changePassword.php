<?php 
session_start();

if(isset($_POST['code']) && isset($_SESSION['mail'])){
    if($_POST['code'] != $_SESSION['motdepasse']){
        header('Location: password.php');
        exit;
              
    }else{
        unset($_SESSION['motdepasse']);
    }
}elseif (!isset($_SESSION['connected'])){
    header('Location: password.php');
    exit;
    
}else{
    if (isset($_POST['motdepasse'])){
        $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        //$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root');

        $req = $bdd->prepare('
            SELECT password
            FROM Members 
            WHERE email = :mail');
        
        $req -> execute(array(':mail' => $_SESSION['mail']));
        $data = $req -> fetch();

        if(!password_verify($_POST['motdepasse'], $data[0])){
            header('Location: confirmationUser.php');
            exit;
        }
        
    }else{
        header('Location: confirmationUser.php');
        exit;

    }
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
    <form method="post" action="../php_pur/sqlmodifierpassword.php">
        Nouveau mot de passe : <input type="password" name="password" placeholder="Nouveau mot de passe"><br>
        Confirmez votre mot de passe : <input type="password" name="passwordConfirm" placeholder="Nouveau mot de passe"><br>
        <input type="submit" value="Changer">
    </form>
    
</body>
</html>