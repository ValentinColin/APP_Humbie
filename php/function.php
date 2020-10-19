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

?>