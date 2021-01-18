<?php
include('../../Controller/function.php');
session_start();

if_not_connected('loginPage.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change picture</title>
</head>

<body>
    <form method="post" action="../../php_pur/photoCheck.php" enctype="multipart/form-data">
        <p>Send your picture :</p>
        <p><input type="file" name="photo"></p>
        <p><input type="submit" value="Envoyer la photo"></p>
    </form>
</body>

</html>