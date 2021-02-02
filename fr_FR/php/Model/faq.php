<?php
include("login_bdd.php");


/* Renvoie un tableau des id/question/answer de la FAQ */
function getFAQ()
{
	$bdd = login_bdd();
	$req = $bdd->query('SELECT id, question_FR, answer_FR
						FROM faq');

	$faq = array();
	while ($row = $req->fetch()) {
		array_push($faq, array(
			'id' 	   => $row['id'],
			'question' => $row['question_FR'],
			'answer'   => $row['answer_FR']
		));
	}
	$req->closeCursor();
	return $faq;
}

/**
 * Cette fonction ajouter une question/answser de FAQ dans la BDD
 */
function addQuestion($question, $answer)
{
	$bdd = login_bdd();
	$req = $bdd->prepare('INSERT INTO `faq`(`question_FR`, `answer_FR`)
    					  VALUES (:question ,:answer)');

	$req->execute(array(
		':question' => $question,
		':answer' => $answer
	));
}

/* Supprime une question/answer de la FAQ dans la BDD */
function deleteQuestion($id)
{
	$bdd = login_bdd();
	$bdd->query('DELETE FROM faq
    			 WHERE id = ' . $id);
}
