<?php
session_start();
if ($_POST['password'] == $_POST['passwordConfirm']){
    $bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $req = $bdd->prepare('UPDATE members 
                          SET password = :motdepasse
                          WHERE email = :mail'
                        );
    $req -> execute(array(':mail' =>$_SESSION['mail'], ':motdepasse' => $_POST['password']));
}else{
    header('Location: changepassword.php');
}





?>