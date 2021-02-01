<?php
include("login_bdd.php");
include("../Controller/mail.php");

/* Permet d'envoyer son ticket */
function ticketPost($topic, $title, $id, $content)
{
    $bdd = login_bdd();
    $req = $bdd->prepare('INSERT INTO `tickets`(`topic`, `subject`, `id_member`, `msg_request`, `id_admin`, `date_reply`, `msg_reply`, `status`)
    VALUES (:topic ,:title,:id_member,:message_content,null,null,null,:statut)');

    $req->execute(array(
        'topic' => $topic,
        'title' => $title,
        'id_member' => $id,
        'message_content' => $content,
        'statut' => 'in_process'
    ));
}

/* Permet de répondre à un ticket */
function ticketReply($id, $reponse, $post)
{
    $bdd = login_bdd();
    $req = $bdd->prepare('UPDATE `tickets` SET `id_admin`= :id_admin,`date_reply`= :date_reply,
    `msg_reply`= :message_reply,`status`= "validated" WHERE `id_ticket`= :id_ticket');

    $req->execute(array(
        'id_admin' => $id,
        'date_reply' => date('Y-m-d H:i:s'),
        'message_reply' => $reponse,
        'id_ticket' => idTicket($post)
    ));
}

function sendTicketByMail($post)
{
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_ticket`,`topic`, `subject`, `id_member`, `date_request`, `msg_request`,`msg_reply`,`nom`,`prenom`,`email`
                    FROM `tickets`  JOIN `members`ON tickets.id_member = members.id WHERE `id_ticket` = ' . idTicket($post));
    $row = $req->fetch();

    $message =  "Your ticket has been answered. \r\n
                Topic : " . $row['topic'] . " \r
                subjet : " . $row['subject'] . " \r
                Qestion from : " . $row["nom"] . " " . $row["prenom"] . " \r
                Requested on : " . $row['date_request'] . " \r\n
                Content : " . $row['msg_request'] . " \r\n
                Answer : " . $row['msg_reply'];

    $mail = sendMail($row["email"], 'Reply to your ticket' , $message);
    return $mail;
}



/* Permet de récupérer l'id d'un ticket */
function idTicket($post)
{
    $keys = array_keys($post);
    return $keys[1];
}

/* Récupère les tickets en attente*/
function getTicket()
{
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_ticket`,`topic`, `subject`, `id_member`, `date_request`, `msg_request`
                    FROM `tickets` WHERE `status` = "in_process"');
    $ticket = array();
    while ($row = $req->fetch()) {
        $reponse = $bdd->query('SELECT  `nom`,`prenom`FROM `members` WHERE `id` = ' . $row["id_member"]);
        $datas = $reponse->fetch();
        array_push($ticket, array(
            "id_ticket" => $row["id_ticket"],
            "topic"     => $row["topic"],
            "subject"   => $row["subject"],
            "id_member" => $row["id_member"],
            "date_request" => $row["date_request"],
            "msg_request" => $row["msg_request"],
            "name"      => $datas["nom"],
            "firstname"      => $datas["prenom"]
        ));
    }
    $req->closeCursor();
    return $ticket;
}

function getTicketById($id, $status)
{
    $bdd = login_bdd();
    $req = $bdd->query('SELECT  `id_ticket`,`topic`, `subject`, `id_member`, `date_request`, `msg_request`,`msg_reply`
                    FROM `tickets` WHERE `id_member` = ' . $id . ' AND `status` = ' . $status);
    $ticket = array();
    while ($row = $req->fetch()) {
        $reponse = $bdd->query('SELECT  `nom`,`prenom`FROM `members` WHERE `id` = ' . $row["id_member"]);
        $datas = $reponse->fetch();
        array_push($ticket, array(
            "id_ticket" => $row["id_ticket"],
            "topic"     => $row["topic"],
            "subject"   => $row["subject"],
            "id_member" => $row["id_member"],
            "date_request" => $row["date_request"],
            "msg_request" => $row["msg_request"],
            "name"      => $datas["nom"],
            "firstname"      => $datas["prenom"],
            "msg_reply"  => $row["msg_reply"]
        ));
    }
    $req->closeCursor();
    return $ticket;
}
