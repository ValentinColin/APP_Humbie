<?php 
session_start();

require_once("function.php");
require_once("mail.php");
require_once("../Model/create_user.php");


if(isset($_POST['email'])){
    
    $reinitialisationPassword = passwordgen();
    $_SESSION['reinitialisationPassword'] = $reinitialisationPassword;
    $_SESSION['email'] = $_POST['email'];
    sendMail($_POST['email'],'Code de confidentialité',"Voici le code de sécurité vous permettant de réinitialiser votre mot de passe: \n $reinitialisationPassword");
    header('Location: ../View/mailNewPassword.php');
    exit;

}elseif(isset($_POST['password'])){
    if($_POST['password'] == $_SESSION['reinitialisationPassword']){
        $_SESSION['reinitialisation'] = true;
        header('Location: ../View/mailNewPassword.php');
        exit;
    }
}elseif(isset($_POST['newpassword']) && isset($_POST['repeatpassword'])){
    if($_POST['newpassword'] == $_POST['repeatpassword']){
        changePassword($_POST['newpassword'],$_SESSION['email']);
        unset($_SESSION['reinitialisationPassword']);
        if(isset($_SESSION['error'])){
            unset($_SESSION['error']);
        }
        header('Location: ../View/login.php');
        exit;
    }
}else{
    $_SESSION['error'] = true;
    header('Location: ../View/mailNewPassword.php');
    exit;
}
?>