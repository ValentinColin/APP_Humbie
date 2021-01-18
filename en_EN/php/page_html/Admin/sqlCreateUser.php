<?php
require_once('../../php_pur/function.php');


$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT INTO `members`( `access`, `password`, `email`, `firstname`, `lastname`, `birthday_date`, `aviation_licence_date`, `inscription_date`, `id_manager`) 
VALUES (:access, :pass, :email, :firstname, :lastname, :birthday_date, :aviation, null, null)');


$password = passwordgen(8);
$message = ' Here is the secret code : ' . $password;
$mail = mail($_POST['Mail'], 'Creation Humbie account', $message);
if($mail){
        
    $req -> execute(array(
        ':access' => $_POST['role'],
        ':pass' => passwordhash($password),
        ':email' => $_POST['Mail'],
        ':firstname' => $_POST['First Name'],
        ':lastname' => $_POST['Last Name'],
        ':birthday_date' => $_POST['Birthday Date'],
        ':aviation' => null
        ));

}else{
    header('Location: createuser.php?erreur=mail');
    exit;
}

header('Location: createuser.php?erreur=None');
?>