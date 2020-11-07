<?php
session_start();
include('../php_pur/function.php');
if_not_connected('loginPage.php');
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changement de photo</title>
</head>
<body>
    <form method="post" action="../php_pur/photoCheck.php" enctype="multipart/form-data">
        <p>Envoyer votre photo :</p>
        <p><input type="file" name="photo"></p>
        <p><input type="submit" value="Envoyer la photo" ></p>
    </form>
</body>
</html>