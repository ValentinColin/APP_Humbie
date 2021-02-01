<?php
include('../Model/create_user.php');
include('../Controller/mail.php');

/*
 * Vérifier que les données entrante sont correctes, toutes valide
 */

if (mail_exist($_POST['mail'])) {
	header('Location: ../View/Admin/create_user.php?mailExisting=true');
	exit;
} else {
	$password = create_user($_POST);
	
	$mail = sendMail($_POST['mail'], 'Initialisation du mot de passe' ,"Votre compte Humbie a été crée: \n Pour vous connecter \n mail: $_POST[mail] \n mot de pase: $password \n\n Your Humbie account has been created: \n To log in \n email: $_POST[mail] \n password: $password ");

	if ($mail)
		header('Location: ../View/Admin/create_user.php?sending=true');
	else
		header('Location: ../View/Admin/create_user.php?sending=false');
}