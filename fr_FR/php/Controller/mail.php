<?php 
// lance les classes de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
// path du dossier PHPMailer % fichier d'envoi du mail
require '../../../PHPMailer/src/Exception.php';
require '../../../PHPMailer/src/PHPMailer.php';
require '../../../PHPMailer/src/SMTP.php';


/**
 * Cette fonction envoie un mail au $destinataire, avec un sujet et un contenu
 * Renvoie true si le mail à été envoyer avec succès, false sinon.
 */
function sendMail($destinataire, $sujet , $contenu){
	define("MAIL",'service.humbie@gmail.com');
	define('MAIL_PASSWORD', 'G1Dhumbie');

	$mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;  // Enable verbose debug output
		$mail->isSMTP();     // Send using SMTP
		$mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
		$mail->SMTPAuth   = true;   // Enable SMTP authentication
		$mail->Username   = MAIL;     // SMTP username
		$mail->Password   = MAIL_PASSWORD;  // SMTP password
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		$mail->Port       = 587;   // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
		// From email address and name
		$mail->setFrom(MAIL, 'Humbie');

		// To email addresss
		$mail->addAddress($destinataire);   // Add a recipient

		// Content
		$mail->isHTML(false);  // Set email format to HTML
		$mail->Subject = $sujet;
		$mail->Body    = $contenu;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
		return true;
		

	} catch (Exception $e) {
		return false;
	
	}
}


?>