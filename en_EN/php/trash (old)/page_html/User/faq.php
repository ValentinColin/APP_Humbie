<?php 

$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reponse = $bdd->query('
	SELECT question, answer
	FROM Faq ');


while ($donnees = $reponse->fetch())
{   
    echo 'Questions : <br>';
    echo $donnees['question'].'<br> <br>';
    echo 'Réponses : <br>';
    echo $donnees['answer'].'<br> <br><br>';
}

?>