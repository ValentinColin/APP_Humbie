<?php
include('../Model/create_user.php');

/*
 * Vérifier que les données entrante sont correctes, toutes valide
 */

if (mail_exist($_POST['mail'])) {
	header('Location: ../View/Admin/create_user.php?mailExisting=true');
	die();
} else {
	$password = create_user($_POST);
	$mail = mail($_POST['mail'], 'Password initialization
', $password);

	if ($mail)
		header('Location: ../View/Admin/create_user.php?sending=true');
	else
		header('Location: ../View/Admin/create_user.php?sending=false');
}
