<?php
session_start();
include('../../Controller/function.php');
verif_access('ADMIN');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change photo</title>
</head>

<body>
    <form method="post" action="../../php_pur/photoCheck.php" enctype="multipart/form-data">
        <p>Send your photo :</p>
        <p><input type="file" name="photo"></p>
        <p><input type="submit" value="Send picture"></p>
    </form>
</body>

</html>