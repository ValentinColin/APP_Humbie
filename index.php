<?php
header('Location: fr_FR/php/View/login.php')
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>
    <body>
    <p>
        Salut !<br />
        Tu es à l'accueil de mon site (index.php). Tu veux aller sur une autre page ?
    </p>
    <table>
    	<tr>
    		<td><a href="fr_FR/php/page_html/loginPage.php">Page de connexion</a></td>
    		<td>: (Notre site web principal)</td>
    	</tr>
        <tr>
            <td><a href="fr_FR/php/View/login.php">Page de connexion</a></td>
            <td>: (Notre site web principal avec l'architecture MVC)</td>
        </tr>
    	<tr>
    		<td><a href="DataBase.php">DataBase</a></td>
    		<td>: (Afficher la liste des membres enregistrer dans la base de données)</td>
    	</tr>
    </table>
    </body>
</html>
