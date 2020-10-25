<?php
session_start();
include('function.php');
if_not_connected('loginPage.php');
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Changement de photo</title>
</head>
<body>
    <form method="post" action="photoCheck.php" enctype="multipart/form-data">
        <p>
            Envoyer votre photo : <br>
            <input type="file" name="photo"><br>
            <input type="submit" value="Envoyer la photo" >
        </p>
    </form>
    
</body>
</html>