<?php
session_start();

// Suppression des variables de session et de la session
$_SESSION = array();
session_destroy();

// Redirection
header('Location: ../page_html/loginPage.php');
?>