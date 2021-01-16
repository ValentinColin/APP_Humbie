<?php 
include("../Model/profilModifier.php");
include("function.php");
if_not_connected($redirection = "../../View/login.php");


if(isset($_POST['email']))
{   

    modifierprofil($_POST['email'],$_POST['birthday_date'],$_POST['country'],$_POST['phone']);
    goView('profil.php');
    die;
}
elseif(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
    $authorizedExtensions = ['jpeg','png','jpg'];
    $filePath = pathinfo($_FILES['photo']['name']);
    $fileExtension = $filePath['extension'];
    if (in_array($fileExtension, $authorizedExtensions ))
    {   
        $_FILES['photo']['name'] = $_SESSION['id'].'.png';
        move_uploaded_file($_FILES['photo']['tmp_name'],path_photo_controller());
        goView('profil.php');
        die;
    }
}
else
{   
    goView('profilModifier.php');
    die;
}
?>