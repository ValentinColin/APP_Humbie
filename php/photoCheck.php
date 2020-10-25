<?php
session_start(); 

if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
    $authorizedExtensions = ['jpeg','png','jpg'];
    $filePath = pathinfo($_FILES['photo']['name']);
    $fileExtension = $filePath['extension'];
    if (in_array($fileExtension, $authorizedExtensions ))
    {   
        $_FILES['photo']['name'] = $_SESSION['id'].'.'.$fileExtension;
        move_uploaded_file($_FILES['photo']['tmp_name'],'../Images/photoUser/' .$_FILES['photo']['name']);
        echo 'ca marche';
    }
}

?>