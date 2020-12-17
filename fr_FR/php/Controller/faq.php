<?php 
include("../Controller/function.php");
include("../Model/faq.php");
session_start();
if_not_connected($redirection="../View/login.php");

$bdd = login_bdd();

if (isset($_POST['add'])){
    addQuestion($_POST['question'], $_POST['answer']);
}
else{ // On supprime une question/réponse
    $keys = array_keys($_POST);
    $id = $keys[0];

    deleteQuestion($id);
}

header('Location: ../View/Admin/faq.php');
exit;