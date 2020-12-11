<?php

function if_not_connected($redirection){
	if(!$_SESSION['connected']){
		header('Location: '.$redirection);
		exit;
	}
}

function if_connected($redirection){
	if($_SESSION['connected']){
		header('Location: '.$redirection);
		exit;
	}
}

function go($page){
	switch ($_SESSION['access']) {
		case 'USER':
			$role_folder = 'User';
			break;
		case 'MANAGER':
			$role_folder = 'Manager';
			break;
		case 'ADMIN':
			$role_folder = 'Admin';
			break;
	}
	header('Location: '.$role_folder.'/'.$page);
	exit;
}

// Peut-être pas encore fonctionnel (à voir selon l'organisation des fichiers et la méthode des liens de redirecetion)
/*
function path_lang($default_path){
	$path = $default_path;
	if($_SESSION['lang'] == 'en'){
		if(substr($default_path,0,3) == '../'){
			$path = '../en_EN/' . substr($default_path,3);
		} else {
			$path = '../en_EN/' . $default_path;
		}
	}
	return $path;
}*/

function path_photo(){
	return '../../../../Images/Photo/'.$_SESSION['prenom'].$_SESSION['nom'].$_SESSION['id'].'.png';
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

// Cette focntion s'assure qu'une donnée  existe et renvoie le contenu de la donnée de manière sécurisée.
function exist_data(String $data, bool $post=True ) : String {
	if($post){// on vérfie si la donnée existe et n'est pas vide.
		if (isset($_POST[$data]) && ! empty($_POST[$data])){
			return htmlspecialchars($_POST[$data]);
		}
		else{
			return '0';
		}
	}
	else{// on vérfie si la donnée existe et n'est pas vide.
		if (isset($_GET[$data]) && ! empty($_GET[$data])){
			return htmlspecialchars($_GET[$data]);
		}
		else{
			return '0';
		}
	}
}

?>