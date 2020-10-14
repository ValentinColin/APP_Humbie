<?php
session_start();
if(!$_SESSION['connected']){
    header('Location: maquette.php');
}
echo 'vous êtes sur la page principale ';

?>
<!doctype html>
<head>
    <meta charset="UTF-8">
    <title> Maquette site web page de navigation</title>
</head>

<body>
    <form method='post' action='logout.php'>
        <input type='submit' value='déconnexion'>
    </form>
</body>