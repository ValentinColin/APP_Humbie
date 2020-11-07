<?php
session_start(); 
include('function.php');
if_not_connected('../page_html/loginPage.php');

if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
    $authorizedExtensions = ['jpeg','png','jpg'];
    $filePath = pathinfo($_FILES['photo']['name']);
    $fileExtension = $filePath['extension'];
    if (in_array($fileExtension, $authorizedExtensions ))
    {   
        $_FILES['photo']['name'] = $_SESSION['id'].'.png';
        move_uploaded_file($_FILES['photo']['tmp_name'],path_photo());
        header('Location: ../page_html/home.php');
    }else
    {
        header('Location: ../page_html/parametres.php');
    }
}else
{
    header('Location: ../page_html/parametres.php');
}

?>