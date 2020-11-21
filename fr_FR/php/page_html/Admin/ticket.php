<?php 

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$req =$bdd->query('SELECT  `id_ticket`,`topic`, `subject`, `id_member`, `date_request`, `msg_request`, `status` 
            FROM `tickets` WHERE `status` = "in_process"'

);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php while($donnees = $req->fetch()):
        if($donnees['status'] =='in_process'):?>

            <p>
                topic : <?= $donnees['topic']?> <br>
                sujet : <?= $donnees['subject']?> <br>
                Question de : <?= $donnees['id_member']?> <br>
                réquête émise le : <?= $donnees['date_request'] ?> <br>
                Contenu: <br> <?= $donnees['msg_request']?>

                <form action="../../php_pur/sqlModifierTicket.php" method="post">
                    <input type="text" name="reponse" placeholder="Contenu de la réponse" require>
                    <input type="submit"  name= <?= sprintf('%d', $donnees['id_ticket']) ?> value="Poster">
                </form>

            </p>
        


        <?php endif;
    endwhile; ?>
    
</body>
</html>