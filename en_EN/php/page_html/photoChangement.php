<?php
session_start();
include('../php_pur/function.php');
if_not_connected('loginPage.php');
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Change picture</title>
</head>
<body>
    <form method="post" action="../php_pur/photoCheck.php" enctype="multipart/form-data">
        <p>Send your picture :</p>
        <p><input type="file" name="photo"></p>
        <p><input type="submit" value="Send your picture" ></p>
    </form>
</body>
</html>