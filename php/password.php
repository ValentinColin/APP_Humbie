<?php 

function passwordgen($len= 6){
    $chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890+-*/%!:/;.,?$";
    $chaine = str_shuffle($chaine);
    $chaine = substr($chaine, 0, $len);
    return $chaine;
}
$motdepasse = passwordgen(7);

$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('UPDATE Members 
                      SET password = :motdepasse
                      WHERE email = :mail'
                        );

$message = 'voici votre nouveau mot de passe : ' . $motdepasse;
$mail = mail($_POST['mail'], 'Réinitialisation du mot de passe', $message);

if($mail){
    echo 'le mail a bien été envoyé';
    $req -> execute(array(':mail' =>$_POST['mail'], ':motdepasse' => $motdepasse));
}else{
    echo 'erreur ';
}
header('Location: loginPage.php');


?>
