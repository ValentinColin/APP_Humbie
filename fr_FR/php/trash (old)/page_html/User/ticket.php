<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form action="../../php_pur/sqlModifierTicket.php" method="post">
    <select name="topic">
        <option value="login" selected>Problème login</option> 
        <option value="test" >Problème test</option>
        <option value="private_information">Information privée</option>
    </select>
    <input type="text" name="title" placeholder="Nom de votre requête">
    <input type="text" name="content" placeholder="Ecrivez votre requête">
    <input type="submit" value="Envoyer" name="poster">
    </form>
</body>
</html>