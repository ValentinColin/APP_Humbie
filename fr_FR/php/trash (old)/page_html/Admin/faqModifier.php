<?php
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    if (isset($_POST['Ajouter'])){

        $req = $bdd->prepare('
        INSERT INTO `faq`(`question`, `answer`) 
        VALUES (:Question ,:Reponse)');

        $req -> execute(array(
                            ':Question' => $_POST['Question'],
                            ':Reponse' => $_POST['Reponse']
                            ));
    }
    else{
        // On supprime une question, réponse
        $keys = array_keys($_POST);
        $id = $keys[0];

        $reponse = $bdd->query('
	    DELETE FROM Faq 
        WHERE id ='.$id);

    }
header('Location: faq.php');

?>