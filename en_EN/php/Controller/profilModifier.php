<?php 
include_once("../Model/profilModifier.php");
include_once("../Model/login.php");
include_once("function.php");
if_not_connected($redirection = "../../View/login.php");


if(isset($_POST['email']))
{   

    modifierprofil($_POST['email'],$_POST['birthday_date'],$_POST['country'],$_POST['phone']);
    header('Location: profil.php');
    die;
}
elseif(isset($_POST['password']) && isset($_POST['newpassword']) && isset($_POST['repetpassword']))
{

    if (login($_SESSION['mail'],$_POST['password']) && $_POST['newpassword'] == $_POST['repetpassword'] )
    {
        change_password($_POST['newpassword'],$_SESSION['id']);
        $_SESSION['passwordError'] = 'ok';
        goView('profilModifier.php');
        die;
    }
    elseif( $_POST['newpassword'] != $_POST['repetpassword'])
    {
        $_SESSION['passwordError'] = 'new';
        goView('profilModifier.php');
        die;
    }
    $_SESSION['passwordError'] = 'old';
    goView('profilModifier.php');
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
        header('Location: profil.php');
        die;
    }
}
else
{   
    goView('profilModifier.php');
    die;
}
?>