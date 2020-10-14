<?php
session_start();
$_SESSION['connected']=0;
header('Location: maquette.php');

?>