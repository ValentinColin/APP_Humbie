<?php
/*
 * Cette fonction vérifie si la personne est connectée
 */
function if_not_connected($redirection)
{
	if (!$_SESSION['connected']) {
		header('Location: ' . $redirection);
		exit;
	}
}

/*
 *	Cette fonction vérifie si le rôle de l'utilisateur correspond à celui en paramètre.
 *	Cela permet de restreindre l'accès aux page du site en fonction de leurs rôles.
 *
 *	ATTENTION: le paramètre $access doit être l'une de ces 4 valeurs:
 *		USER, MANAGER, ADMIN, ALL
 *	Sinon il y aura une redirection vers la page de login.
 */
function verif_role($access) {
	// Je transforme par exemple USER -> User (afin d'utiliser la variable comme un nom de dossier)
	$access_session = ucwords(strtolower($_SESSION['access']));
	switch ($access) {
		case 'USER':
			if ($access_session != 'User') {
				header('Location: ../../View/'.$access_session.'/home.php');
				exit;}
			break;
		
		case 'MANAGER':
			if ($access_session != 'Manager') {
				header('Location: ../../View/'.$access_session.'/home.php');
				exit;}
			break;

		case 'ADMIN':
			if ($access_session != 'Admin') {
				header('Location: ../../View/'.$access_session.'/home.php');
				exit;}
			break;
		
		case 'ALL':
			break;

		default:
			header('Location: ../../View/login.php');
			exit;
			break;
	}
}

/* 
 *	Vérifie si la personne qui est connecter à été banni ou non 
 *	Si la personne à été banni il est rediriger vers la page de connection 
 *	avec une variable banned valant true via un GET
 *	ie: $_GET['banned'] = true
 */
function if_banned() {
	if ($_SESSION['banned']) {
		header('Location: ../../View/login.php?banned=true');
		exit;
	}
}

/*
 *	Cette fonction vérifie les 3 niveaux d'accès à une page
 *	Voir documentation des fonctions:
 *	if_not_connected()
 *	verif_access()
 *	if_banned()
 */
function verif_access($access, $redirection='../../View/login.php') {
	if_not_connected($redirection);
	verif_role($access);
	if_banned();
}

function go($page)
{
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
	header('Location: ' . $role_folder . '/' . $page);
	exit;
}

function goView($page)
{
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
	header('Location: ../View/' . $role_folder . '/' . $page);
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

function path_photo()
{	
	if (file_exists('../../../../Images/Photo/' . $_SESSION['prenom'] . $_SESSION['nom'] . $_SESSION['id'] . '.png')) {
		return '../../../../Images/Photo/' . $_SESSION['prenom'] . $_SESSION['nom'] . $_SESSION['id'] . '.png';
	} else {
		return '../../../../Images/Photo/default.png';
	}
}

function path_photo_controller()
{
	return '../../../Images/Photo/' . $_SESSION['prenom'] . $_SESSION['nom'] . $_SESSION['id'] . '.png';
}

function user_name()
{
	return $_SESSION['prenom'] . ' ' . $_SESSION['nom'];
}

function passwordgen($len = 6)
{
	$chaine = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN1234567890+-*/%!:/;.,?$";
	$chaine = str_shuffle($chaine);
	$chaine = substr($chaine, 0, $len);
	return $chaine;
}

function passwordhash($password)
{
	return password_hash($password, PASSWORD_BCRYPT, ['cost' => 9]);
}

// Cette focntion s'assure qu'une donnée  existe et renvoie le contenu de la donnée de manière sécurisée.
function exist_data(String $data, bool $post = True): String
{
	if ($post) { // on vérfie si la donnée existe et n'est pas vide.
		if (isset($_POST[$data]) && !empty($_POST[$data])) {
			return htmlspecialchars($_POST[$data]);
		} else {
			return '0';
		}
	} else { // on vérfie si la donnée existe et n'est pas vide.
		if (isset($_GET[$data]) && !empty($_GET[$data])) {
			return htmlspecialchars($_GET[$data]);
		} else {
			return '0';
		}
	}
}

// function qui permet la redicrection suivant le rôle de l'utilisateur connecté.
function role(String $role, String $redirectionUser, String $redirectionManager, String $redirectionAdmin): String
{
	if ($role == "USER") {
		return $redirectionUser;
	} else if ($role == "MANAGER") {
		return $redirectionManager;
	} else {
		return $redirectionAdmin;
	}
}

// fonction qui permet de donner min,max et moyenne.
function stats(array $array){
	$min = min($array);
	$max = max($array);
	$total = 0;
	$n = 0;
	foreach ($array as $value){
		$total += $value;
		$n += 1;
	}
	$moy = $total/$n;
	$results = [$min,$moy,$max];

	return $results;
}



// fonction qui renvoie le chemin du home.php dans l'autre langue et redéfinie la variable $_SESSIONS['lang']
function change_path_lang(){
	if ($_SESSION['lang'] == 'Français'){
		$lang = 'en_EN';
		$_SESSION['lang'] = 'English';
	} else if ($_SESSION['lang'] == 'English') {
		$lang = 'fr_FR';
		$_SESSION['lang'] = 'Français';
	} else {
		die('erreur de redirection, lang='.$_SESSION['lang'].' role='.$_SESSION['access'])
	}
	$role = ucfirst(strtolower($_SESSION['access'])); 
	return "../../../../".$lang."/php/View/".$role."/home.php";
}