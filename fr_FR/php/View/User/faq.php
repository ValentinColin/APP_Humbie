<?php
include("../../Model/login_bdd.php");

$bdd = login_bdd();

$reponse = $bdd->query('SELECT question, answer
						FROM Faq');


while ($donnees = $reponse->fetch())
{   
    echo 'Questions : <br>';
    echo $donnees['question'].'<br><br>';
    echo 'Réponses : <br>';
    echo $donnees['answer'].'<br><br><br>';
}

?>