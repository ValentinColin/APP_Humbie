<?php 

function if_not_connected($redirection){
	if(!$_SESSION['connected']){
    	header('Location: '.$redirection);
	}
}

function if_connected($redirection){
	if($_SESSION['connected']){
    	header('Location: '.$redirection);
	}
}

function generate_path_photo(){
	return '../Images/Photo/'.$_SESSION['prenom'].$_SESSION['nom'].$_SESSION['id'].'.png';
}

function user_name(){
	return $_SESSION['prenom'].' '.$_SESSION['nom'];
}

function passwordgen($len= 6){
    $chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890+-*/%!:/;.,?$";
    $chaine = str_shuffle($chaine);
    $chaine = substr($chaine, 0, $len);
    return $chaine;
}

function passwordhash($password){
	return password_hash($password, PASSWORD_BCRYPT,['cost' => 9]);
}

?>