<?php
session_start();

if (!isset($_POST['password']) || !isset($_POST['passwordConfirm'])){
    header('Location: changepassword.php');
    exit;
}
if ($_POST['password'] == $_POST['passwordConfirm']){
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('UPDATE members 
                          SET password = :motdepasse
                          WHERE email = :mail'
                        );
    $req -> execute(array(':mail' =>$_SESSION['mail'], ':motdepasse' => $_POST['password']));
    unset($_SESSION['mail']);
    header('Location: loginPage.php');
    exit;
}else{
    header('Location: changepassword.php');
    exit;
}


?>