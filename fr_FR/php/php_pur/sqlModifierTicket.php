<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=Humbie', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

if (isset($_POST['poster'])){
    
    $req = $bdd->prepare('INSERT INTO `tickets`(`topic`, `subject`, `id_member`, `msg_request`, `id_admin`, `date_reply`, `msg_reply`, `status`) 
    VALUES (:topic ,:title,:id_member,:message_content,null,null,null,:statut)');

    $req->execute(array(
        'topic' => $_POST['topic'],
        'title' => $_POST['title'],
        'id_member' => $_SESSION['id'],
        'message_content' => $_POST['content'],
        'statut' => 'in_process'

    ));
header('Location: ../page_html/User/ticket.php');
}else{

    $req = $bdd->prepare('UPDATE `tickets` SET `id_admin`= :id_admin,`date_reply`= :date_reply,
    `msg_reply`= :message_reply,`status`= "validated" WHERE `id_ticket`= :id_ticket');

    $keys = array_keys($_POST);
    $id_ticket = $keys[1];

    $req->execute(array(
        'id_admin' => $_SESSION['id'],
        'date_reply' => date('Y-m-d H:i:s'),
        'message_reply' => $_POST['reponse'],
        'id_ticket' => $id_ticket
    ));

header('Location: ../page_html/Admin/ticket.php');
}
?>

