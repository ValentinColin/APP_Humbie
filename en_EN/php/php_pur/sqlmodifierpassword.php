<?php
session_start();
include('function.php');

if (!isset($_POST['password']) || !isset($_POST['passwordConfirm'])){
    header('Location: ../page_html/changepassword.php');
    exit;
}
if ($_POST['password'] == $_POST['passwordConfirm']){
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('UPDATE members 
                          SET password = :motdepasse
                          WHERE email = :mail'
                        );
    $password = passwordhash($_POST['password']);
    $req -> execute(array(':mail' =>$_SESSION['mail'], ':motdepasse' => $password));
    unset($_SESSION['mail']);
    header('Location: ../page_html/loginPage.php');
    exit;
}else{
    header('Location: ../page_html/changepassword.php');
    exit;
}


?>