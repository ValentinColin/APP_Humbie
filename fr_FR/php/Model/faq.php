<?php
include("login_bdd.php");


/* Renvoie un tableau des id/question/answer de la FAQ */
function getFAQ()
{
	$bdd = login_bdd();

	$req = $bdd->query('SELECT id, question, answer
						FROM faq');

	$faq = array();
	while ($row = $req->fetch()) {
		array_push($faq, array(
			"question" => $row["question"],
			"answer"   => $row["answer"],
			"id" 	   => $row["id"]
		));
	}

	$req->closeCursor();

	return $faq;
}

function addQuestion($question, $answer)
{
	$bdd = login_bdd();
	$req = $bdd->prepare('INSERT INTO `faq`(`question`, `answer`)
    					  VALUES (:question ,:answer)');

	$req->execute(array(
		':question' => $question,
		':answer' => $answer
	));
}

/* Supprime une Question/Answer de la FAQ */
function deleteQuestion($id)
{
	$bdd = login_bdd();
	$bdd->query('DELETE FROM faq
    			 WHERE id = ' . $id);
}
