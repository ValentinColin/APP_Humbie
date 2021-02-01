<?php 
session_start();
require_once("function.php");
require_once("mail.php");
require_once("../Model/create_user.php");

if(isset($_SESSION['error']) && $_SESSION['error']){
    unset($_SESSION['error']);
}

if(isset($_POST['mail'])){
    
    $reinitialisationPassword = passwordgen();
    $_SESSION['reinitialisationPassword'] = $reinitialisationPassword;
    $_SESSION['mail'] = $_POST['mail'];
    sendMail($_POST['mail'],'Code de confidentiel',"Voici le code de sécurité vous permettant de réinitialiser votre mot de passe: \n $reinitialisationPassword");
    header('Location: ../View/confirmer.php');
    exit;

}elseif(isset($_POST['password'])){
    if($_POST['password'] == $_SESSION['reinitialisationPassword']){
        $_SESSION['reinitialisation'] = true;
        $_SESSION['access'] = $_SESSION['mail'];
        header('Location: ../View/newPassword.php');
        exit;
    }
    else{
        $_SESSION['error'] = true;
        header('Location: ../View/confirmer.php');
        exit;
    }
}elseif(isset($_POST['newpassword']) && isset($_POST['repeatpassword'])){
    if($_POST['newpassword'] == $_POST['repeatpassword']){
        changePassword($_POST['newpassword'],$_SESSION['mail']);
        unset($_SESSION['reinitialisationPassword']);
        header('Location: ../View/login.php');
        exit;
    }
    else{
        $_SESSION['error'] = true;
        header('Location: ../View/newPassword.php');
        exit;
    }
}elseif(isset($_POST['resend'])){
    $reinitialisationPassword = passwordgen();
    $_SESSION['reinitialisationPassword'] = $reinitialisationPassword;
    sendMail($_SESSION['mail'],'Code de confidentiel',"Voici le code de sécurité vous permettant de réinitialiser votre mot de passe: \n $reinitialisationPassword");
    header('Location: ../View/confirmer.php');
    exit;
}
else{
    header('Location: ../View/mailNewPassword.php');
    exit;
}
?>