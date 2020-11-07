<?php
// En cas d'erreur non compréhensible, rajouter le dernière argument ci-dessous pour avoir plus de détails
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root');

$reponse = $bdd->query('
	SELECT id, access , prenom, nom, email, password
	FROM Members 
	ORDER BY access');


echo '<table>';
echo '<caption>Base de donnée</caption>';
echo '<tr>
		<td> id      </td>
		<td><strong> access   </strong></td>
		<td><strong> prenom   </strong></td>
		<td><strong> nom      </strong></td>
		<td><strong> password </strong></td>
		<td><strong> email    </strong></td>
	  </tr>';

while ($donnees = $reponse->fetch())
{
	echo 	'<tr>' . 
				'<td>' . $donnees['id']       . '</td>' .
				'<td>' . $donnees['access']   . '</td>' .
				'<td>' . $donnees['prenom']   . '</td>' .
				'<td>' . $donnees['nom']      . '</td>' .
				'<td>' . $donnees['password'] . '</td>' .
				'<td>' . $donnees['email'] . '</td>' .
			'</tr>';
}
echo '</table>';
?>

<?php
/* 
Cette requête imaginaire sert principale d’aide-mémoire 
pour savoir dans quel ordre sont utilisé chacun des commandes 
au sein d’une requête SELECT.

SELECT *
FROM table
WHERE condition
GROUP BY expression
HAVING condition
{ UNION | INTERSECT | EXCEPT }
ORDER BY expression [DESC]
LIMIT count
OFFSET start
*/

/* Pour vérifier qu'il n'y est pas d'erreur dans l'utilisation de la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Humbie;charset=utf8','root','root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
*/
?>