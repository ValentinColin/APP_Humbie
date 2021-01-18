<?php 

$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reponse = $bdd->query('
	SELECT question, answer,id
	FROM Faq ');

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php

    while ($donnees = $reponse->fetch())
    {   
        echo 'Questions : <br>';
        echo $donnees['question'].'<br> <br>';
        echo 'Answer : <br>';
        echo $donnees['answer'];
        ?>
        <form method="post" action="faqModifier.php">
            <input type="submit" value= "Delete" name=<?= sprintf('%d', $donnees['id'])?> >

        </form> <br><br>

        <?php

            
            
        
    }

?>

<form method="post" action="faqModifier.php">

            <input type="text" placeholder="Question" name="Question">
            <input type="text" placeholder="Answer" name="Answer" >
            <input type="submit" value="Add" name="Ajouter" >

</form>

</body>
</html>