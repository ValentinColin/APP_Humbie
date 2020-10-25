<?php
session_start(); 
include('function.php');
if_not_connected('loginPage.php');

if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
    $authorizedExtensions = ['jpeg','png','jpg'];
    $filePath = pathinfo($_FILES['photo']['name']);
    $fileExtension = $filePath['extension'];
    if (in_array($fileExtension, $authorizedExtensions ))
    {   
        $_FILES['photo']['name'] = $_SESSION['id'].'.png';
        move_uploaded_file($_FILES['photo']['tmp_name'],generate_path_photo());
        header('Location: main.php');
    }else
    {
        header('Location: parametres.php');
    }
}else
{
    header('Location: parametres.php');
}

?>