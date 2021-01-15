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
else
{   
    goView('profilModifier.php');
    die;
}
?>