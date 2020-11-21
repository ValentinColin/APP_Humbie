<?php 

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req =$bdd->query('SELECT  `id_ticket`,`topic`, `subject`, `id_member`, `date_request`, `msg_request`, `status` 
                    FROM `tickets` WHERE `status` = "in_process"');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php $i=0 ?>
    <?php while($donnees = $req->fetch()):
        if($i==0){
            echo '<h1> Les Tickets en attente : </h1> ';
            $i += 1;
        }
        if($donnees['status'] =='in_process'):

            $reponse =$bdd->query('SELECT  `nom`,`prenom`
                                FROM `members` WHERE `id` = '.$donnees["id_member"]);
            $datas= $reponse->fetch();

            ?>

            <p>
                topic : <?= $donnees['topic']?> <br>
                sujet : <?= $donnees['subject']?> <br>
                Question de : <?= $datas['nom']." ".$datas['prenom']?> <br>
                réquête émise le : <?= $donnees['date_request'] ?> <br>
                Contenu: <br> <?= $donnees['msg_request']?>

                <form action="../../php_pur/sqlModifierTicket.php" method="post">
                    <input type="text" name="reponse" placeholder="Contenu de la réponse" require>
                    <input type="submit"  name= <?= sprintf('%d', $donnees['id_ticket']) ?> value="Poster">
                </form>

            </p>
        


        <?php endif;
    endwhile; 
    if($i ==0){
        echo "<h1> Il n'y a pas de tickets en attente !";
    }
    ?>
    
</body>
</html>