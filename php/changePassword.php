<?php 
session_start();

if(isset($_POST['code']) && isset($_SESSION['mail'])){
    if($_POST['code'] != $_SESSION['motdepasse']){
        header('Location: password.php');
        exit;
              
    }
}else{
    header('Location: password.php');
    exit;
    
}
unset($_SESSION['motdepasse']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="sqlmodifierpassword.php">
        Nouveau mot de passe : <input type="password" name="password" placeholder="Nouveau mot de passe"><br>
        Confirmez votre mot de passe : <input type="password" name="passwordConfirm" placeholder="Nouveau mot de passe"><br>
        <input type="submit" value="Changer">
    </form>
    
</body>
</html>